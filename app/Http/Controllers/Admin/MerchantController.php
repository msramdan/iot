<?php

namespace App\Http\Controllers\Admin;

use App\Models\Merchant;
use App\Models\Bank;
use App\Models\Bussiness;
use App\Models\RekPooling;
use App\Models\MerchantsCategory;
use App\Models\ApprovalLogMerchant;
use App\Models\MdrLog;
use App\Models\Transaction;
use App\Models\MerchantApprove;
use App\Models\Province;
use App\Models\Kabkot;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;
use Throwable;
use Excel;
use App\Exports\MerchantExport;
use Maatwebsite\Excel\Validators\ValidationException as ExcelException;
use App\Imports\MerchantImport;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;

class MerchantController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:merchant_show')->only('index');
        $this->middleware('permission:merchant_create')->only('create', 'store');
        $this->middleware('permission:merchant_update')->only('edit', 'update');
        $this->middleware('permission:merchant_delete')->only('delete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $merchant_categories = MerchantsCategory::all();
        $cities = Kabkot::all();

        if (request()->ajax()) {
            $merchant = Merchant::with([
                'merchant_category',
                'bank:id,bank_name',
                'rek_pooling',
                'bussiness'
            ])
                ->where('is_active', 1)
                ->where('approved1', 'approved')
                ->where('approved2', 'approved');

            if ($request->has('date') && !empty($request->date)) {
                $dates = explode(' to ', $request->date);
                $start = str_replace(',', '', $dates[0])." 00:00:00";
                $end = str_replace(',', '', $dates[1])." 23:59:59";

                $start_dates = date('Y-m-d H:i:s', strtotime($start));
                $end_dates = date('Y-m-d H:i:s', strtotime($end));

                $merchant = $merchant->whereBetween('created_at', [$start_dates, $end_dates]);
            }

            if ($request->has('city') && !empty($request->city)) {
                $merchant = $merchant->where('kabkot_id', $request->city);
            }

            if ($request->has('merchant_category') && !empty($request->merchant_category)) {
                $merchant = $merchant->where('merchant_category_id', $request->merchant_category);
            }

            $merchant = $merchant->orderBy('id', 'desc')->get();

            return DataTables::of($merchant)
                ->addIndexColumn()
                ->addColumn('mid', function ($row) {
                    return $row->mid ? $row->mid : '-';
                })
                ->addColumn('city', function($row) {
                    return $row->city ? $row->city->kabupaten_kota : '-';
                })
                ->addColumn('merchant_category', function ($row) {
                    if ($row->merchant_category) {
                        $merchant_category = $row->merchant_category->first()->merchants_category_name;
                    } else {
                        $merchant_category = '-';
                    }

                    return $merchant_category;
                })
                ->addColumn('bussiness', function ($row) {
                    if ($row->bussiness) {
                        $bussiness = $row->bussiness->first()->bussiness_name;
                    } else {
                        $bussiness = '-';
                    }

                    return $bussiness;
                })
                ->addColumn('created_at', function ($row) {
                    if ($row->created_at) {
                        $created_at = date('d F Y H:i:s', strtotime($row->created_at));
                    } else {
                        $created_at = '-';
                    }

                    return $created_at;
                })
                ->addColumn('rek_pooling', function ($row) {
                    if ($row->rek_pooling) {
                        $rek_pooling = $row->rek_pooling->first()->rek_pooling_code;
                    } else {
                        $rek_pooling = '-';
                    }
                    return $rek_pooling;
                })
                ->addColumn('action', 'admin.merchant._action')
                ->toJson();
        }
        return view('admin.merchant.index', compact('merchant_categories', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = Bank::all();
        $merchant_category = MerchantsCategory::all();
        $bussiness = Bussiness::all();
        $rek_pooling = RekPooling::all();
        $provinces = DB::table('tbl_provinsi')->get();


        return view('admin.merchant.create', compact('bank', 'merchant_category', 'bussiness', 'rek_pooling', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nmid' => 'required|string|max:50',
            'merchant_name' => 'required|string|max:200',
            'merchant_email' => 'required|string|max:100|unique:merchants,email',
            'merchant_type' => 'required|string|in:bussiness,personal',
            'merchant_category_id' => 'required|numeric|exists:merchants_category,id',
            'bussiness_id' => 'required|numeric|exists:bussinesses,id',
            'bank_id' => 'required|numeric|exists:banks,id',
            'account_name' => 'required|string|max:200',
            'mdr' => 'numeric',
            'number_account' => 'required|string|max:100|regex:/[0-9]+/im',
            'rek_pooling_id' => 'required|numeric|exists:rek_poolings,id',
            'pic' => 'image|mimes:jpeg,jpp,png',
            'phone' => 'required|string|max:100|min:11|regex:/[0-9]+/im',
            'provinsi_id' => 'required',
            'kabkot_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'address1' => 'required|string',
            'address2' => 'required|string',
            // 'city' => 'required|string|max:100',
            'zip_code' => 'required|string|max:10',
            'note' => 'string|nullable',
            'identity_card_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'npwp_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'owner_outlet_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'selfie_ktp_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'outlet_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'in_outlet_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'password' => [
                'required', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
        ];

        if ($request->merchant_type == 'personal') {
            $rules['copy_proof_ownership'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
        }

        if ($request->merchant_type == 'bussiness') {
            $rules['siup_photo'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
            $rules['tdp_photo'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
            $rules['copy_corporation_deed'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
            $rules['copy_management_deed'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
            $rules['copy_sk_menkeh'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
        }

        $validator = validator::make(
            $request->all(),
            $rules
        );

        if ($validator->fails()) {

            if ($request->ajax()) {
                return response()->json(['message' => $validator->errors()->first()], 422);
            }

            Alert::toast('Data failed to save', 'error');
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        if ($request->ajax()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        try {
            $merchant = Merchant::create([
                'nmid' => $request->nmid,
                'merchant_name' => $request->merchant_name,
                'email' => $request->merchant_email,
                'merchant_type' => $request->merchant_type,
                'merchant_category_id' => $request->merchant_category_id,
                'bussiness_id' => $request->bussiness_id,
                'bank_id' => $request->bank_id,
                'account_name' => $request->account_name,
                'mdr' => $request->mdr,
                'number_account' => $request->number_account,
                'rek_pooling_id' => $request->rek_pooling_id,
                'pic' => null,
                'phone' => $request->phone,
                'provinsi_id' => $request->provinsi_id,
                'kabkot_id' => $request->kabkot_id,
                'kecamatan_id' => $request->kecamatan_id,
                'kelurahan_id' => $request->kelurahan_id,
                'address1' => $request->address1,
                'address2' => $request->address2,
                // 'city' => $request->city,
                'zip_code' => $request->zip_code,
                'is_active' => $request->is_active == 'active' ? 1 : 0,
                'note' => $request->note,
                'password' => Hash::make($request->password),
            ]);

            $data_merchant_approve['merchant_id'] = $merchant->id;
            //==================== Foto KTP ========================
            if ($request->hasFile('identity_card_photo')) {
                $identity_card_file     = $request->file('identity_card_photo');
                $identity_card_name     = Str::random(15).'.'.$identity_card_file->extension();
                $identity_card_file->storeAs('public/backend/images/identity_card', $identity_card_name);

                $data_merchant_approve['identity_card_photo'] = $identity_card_name;
            }
            //================== End Foto KTP ======================

            //==================== NPWP Photo =======================
            if ($request->hasFile('npwp_photo')) {
                $npwp_file              = $request->file('npwp_photo');
                $npwp_photo_name        = Str::random(15).'.'.$npwp_file->extension();
                $npwp_file->storeAs('public/backend/images/npwp', $npwp_photo_name);

                $data_merchant_approve['npwp_photo'] = $npwp_photo_name;
            }
            //==================== End NPWP Photo ====================

            //=================== Owner outlet photo =================
            if ($request->hasFile('owner_outlet_photo')) {
                $owner_outlet_file      = $request->file('owner_outlet_photo');
                $owner_outlet_name      = Str::random(15).'.'.$owner_outlet_file->extension();
                $owner_outlet_file->storeAs('public/backend/images/owner_outlet', $owner_outlet_name);

                $data_merchant_approve['owner_outlet_photo'] = $owner_outlet_name;
            }
            //================= End Owner outlet photo ==============

            //================ Selfie KTP Photo =====================
            if ($request->hasFile('selfie_ktp_photo')) {
                $selfie_ktp_file        = $request->file('selfie_ktp_photo');
                $selfie_ktp_name        = Str::random(15).'.'.$selfie_ktp_file->extension();
                $selfie_ktp_file->storeAs('public/backend/images/selfie_ktp', $selfie_ktp_name);

                $data_merchant_approve['selfie_ktp_photo'] = $selfie_ktp_name;
            }
            //================= End Selfie KTP Photo ================

            //================== Outlet Photo =======================
            if ($request->hasFile('outlet_photo')) {
                $outlet_file            = $request->file('outlet_photo');
                $outlet_name            = Str::random(15).'.'.$outlet_file->extension();
                $outlet_file->storeAs('public/backend/images/outlet', $outlet_name);

                $data_merchant_approve['outlet_photo'] = $outlet_name;
            }
            //================= End Outlet Photo ====================

            //================= In Outlet Photo =====================
            if ($request->hasFile('in_outlet_photo')) {
                $in_outlet_file         = $request->file('in_outlet_photo');
                $in_outlet_name         = Str::random(15).'.'.$in_outlet_file->extension();
                $in_outlet_file->storeAs('public/backend/images/in_outlet', $in_outlet_name);

                $data_merchant_approve['in_outlet_photo'] = $in_outlet_name;
            }
            //================ End In Outlet Photo ==================

            //============== Surat Keterangan Domisili ==============
            if ($request->hasFile('certificate_of_domicile')) {
                $certificate_of_domicile_file         = $request->file('certificate_of_domicile');
                $certificate_of_domicile_name         = Str::random(15).'.'.$in_outlet_file->extension();
                $certificate_of_domicile_file->storeAs('public/backend/images/certificate_of_domicile', $certificate_of_domicile_name);

                $data_merchant_approve['certificate_of_domicile'] = $certificate_of_domicile_name;
            }
            //============ End Surat Keterangan Domisili ============

            //================= Buku Rekening =====================
            if ($request->hasFile('copy_bank_account_book')) {
                $copy_bank_account_book_file         = $request->file('copy_bank_account_book');
                $copy_bank_account_book_name         = Str::random(15).'.'.$copy_bank_account_book_file->extension();
                $in_outlet_file->storeAs('public/backend/images/copy_bank_account_book', $copy_bank_account_book_name);

                $data_merchant_approve['copy_bank_account_book'] = $copy_bank_account_book_name;
            }
            //================ End Buku Rekening ==================

            //================= Surat sewa / Bukti Kepemilikan =====================
            if ($request->hasFile('copy_proof_ownership')) {
                $copy_proof_ownership_file         = $request->file('copy_proof_ownership');
                $copy_proof_ownership_name         = Str::random(15).'.'.$in_outlet_file->extension();
                $copy_proof_ownership_file->storeAs('public/backend/images/copy_proof_ownership', $copy_proof_ownership_name);

                $data_merchant_approve['copy_proof_ownership'] = $copy_proof_ownership_name;
            }
            //================ End Surat sewa / Bukti Kepemilikan ==================

            //================= SIUP / SURAT IJIN USAHA =====================
            if ($request->hasFile('siup_photo')) {
                $siup_photo_file         = $request->file('siup_photo');
                $siup_photo_name         = Str::random(15).'.'.$siup_photo_file->extension();
                $siup_photo_file->storeAs('public/backend/images/siup_photo', $siup_photo_name);

                $data_merchant_approve['siup_photo'] = $siup_photo_name;
            }
            //================ End SIUP / SURAT IJIN USAHA ==================

            //================= TDP =====================
            if ($request->hasFile('tdp_photo')) {
                $tdp_photo_file         = $request->file('tdp_photo');
                $tdp_photo_name         = Str::random(15).'.'.$tdp_photo_file->extension();
                $tdp_photo_file->storeAs('public/backend/images/tdp_photo', $tdp_photo_name);

                $data_merchant_approve['tdp_photo'] = $tdp_photo_name;
            }
            //================ End TDP ==================

            //================= Akta Pendirian Perusahaan =====================
            if ($request->hasFile('copy_corporation_deed')) {
                $copy_corporation_deed_file         = $request->file('copy_corporation_deed');
                $copy_corporation_deed_name         = Str::random(15).'.'.$copy_corporation_deed_file->extension();
                $copy_corporation_deed_file->storeAs('public/backend/images/copy_corporation_deed', $copy_corporation_deed_name);

                $data_merchant_approve['copy_corporation_deed'] = $copy_corporation_deed_name;
            }
            //================ End Akta Pendirian Perusahaan ==================

            //================= Akta Pengurus Perusahaan =====================
            if ($request->hasFile('copy_management_deed')) {
                $copy_management_deed_file         = $request->file('copy_management_deed');
                $copy_management_deed_name         = Str::random(15).'.'.$copy_management_deed_file->extension();
                $copy_management_deed_file->storeAs('public/backend/images/copy_management_deed', $copy_management_deed_name);

                $data_merchant_approve['copy_management_deed'] = $copy_corporation_deed_name;
            }
            //================ End Akta Pengurus Perusahaan ==================

            //================= Copy SK Menkeh =====================
            if ($request->hasFile('copy_sk_menkeh')) {
                $copy_sk_menkeh_file         = $request->file('copy_sk_menkeh');
                $copy_sk_menkeh_name         = Str::random(15).'.'.$copy_sk_menkeh_file->extension();
                $copy_sk_menkeh_file->storeAs('public/backend/images/copy_sk_menkeh', $copy_sk_menkeh_name);

                $data_merchant_approve['copy_sk_menkeh'] = $copy_sk_menkeh_name;
            }
            //================ End Copy SK Menkeh ==================

            if (count($data_merchant_approve) > 0) {
                $merchant_approve = MerchantApprove::create($data_merchant_approve);
            }

            if ($merchant) {
                Alert::toast('Data Successfully Created Please check the Merchant Approved page', 'success');
                return redirect()->route('merchant.approval');
            } else {
                Alert::toast('Data failed to save', 'error');
                return redirect()->route('merchant.approval');
            }
        } catch(Exception $e) {
            Log::error($e);
            Alert::toast('Data failed to save', 'error');
            return redirect()->route('merchant.approval');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merchant = Merchant::with([
            'merchant_category',
            'bank:id,bank_name',
            'rek_pooling:id,rek_pooling_code',
            'bussiness:id,bussiness_name',
            'merchant_approve'
        ])->findOrFail($id);

        $merchant->load('city');
        return view('admin.merchant.show', compact('merchant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merchant = Merchant::with('merchant_approve')->findOrFail($id);
        $bank = Bank::all();
        $merchant_category = MerchantsCategory::all();
        $bussiness = Bussiness::all();
        $rek_pooling = RekPooling::all();
        $provinces = Province::all();
        $kabkot = Kabkot::where('id', $merchant->kabkot_id)->get();
        $kelurahans = Kelurahan::where('id', $merchant->kelurahan_id)->get();
        $kecamatans = Kecamatan::where('id', $merchant->kecamatan_id)->get();
        return view('admin.merchant.edit', compact('merchant', 'bank', 'merchant_category', 'bussiness', 'rek_pooling', 'provinces', 'kabkot', 'kelurahans', 'kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $merchant = Merchant::findOrFail($id);

        $merchant_approve = MerchantApprove::where('merchant_id', $merchant->id)->first();

        if (!$merchant_approve) {
            $file_rules = 'required|image|mimes:jpeg,png,jpg|max:2048';
        } else {
            $file_rules = 'image|mimes:jpeg,png,jpg|max:2048';
        }

        $rules = [
            'nmid' => 'required|string|max:50',
            'merchant_name' => 'required|string|max:200',
            'merchant_email' => 'required|string|max:100|unique:merchants,email,' . $id,
            'merchant_type' => 'required|string|max:100|in:bussiness,personal',
            'merchant_category_id' => 'required|numeric|exists:merchants_category,id',
            'bussiness_id' => 'required|numeric|exists:bussinesses,id',
            'bank_id' => 'required|numeric|exists:banks,id',
            'account_name' => 'required|string|max:200',
            'mdr' => 'numeric',
            'number_account' => 'required|string|max:100|regex:/[0-9]+/im',
            'rek_pooling_id' => 'required|numeric|exists:rek_poolings,id',
            'pic' => 'image|mimes:jpeg,jpp,png',
            'phone' => 'required|string|max:100|min:11|regex:/[0-9]+/im',
            'address1' => 'required|string',
            'address2' => 'required|string',
            'provinsi_id' => 'required',
            'kabkot_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'zip_code' => 'required|string|max:10',
            'note' => 'string|nullable',
            'identity_card_photo' => $file_rules,
            'npwp_photo' => $file_rules,
            'owner_outlet_photo' => $file_rules,
            'selfie_ktp_photo' => $file_rules,
            'outlet_photo' => $file_rules,
            'in_outlet_photo' => $file_rules,
            'password' => [
                'nullable',Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
        ];

        if ($request->merchant_type == 'personal') {
            $rules['copy_proof_ownership'] = $file_rules;
        }

        if ($request->merchant_type == 'bussiness') {
            $rules['siup_photo'] = $file_rules;
            $rules['tdp_photo'] = $file_rules;
            $rules['copy_corporation_deed'] = $file_rules;
            $rules['copy_management_deed'] = $file_rules;
            $rules['copy_sk_menkeh'] = $file_rules;
        }

        $validator = validator::make(
            $request->all(),
            $rules
        );

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['message' => $validator->errors()->first()], 422);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        DB::beginTransaction();

        try {
            if (isset($request->mdr) && !empty($request->mdr) && (floatval($merchant->mdr) != floatval($request->mdr))) {
                $mdr_log = MdrLog::create([
                    'merchant_id' => $merchant->id,
                    'value_mdr' => floatval($request->mdr),
                ]);
            }

            $merchant->update([
                'nmid' => $request->nmid,
                'merchant_name' => $request->merchant_name,
                'email' => $request->merchant_email,
                'merchant_category_id' => $request->merchant_category_id,
                'bussiness_id' => $request->bussiness_id,
                'bank_id' => $request->bank_id,
                'account_name' => $request->account_name,
                'mdr' => $request->mdr,
                'number_account' => $request->number_account,
                'rek_pooling_id' => $request->rek_pooling_id,
                'provinsi_id' => $request->provinsi_id,
                'kabkot_id' => $request->kabkot_id,
                'kecamatan_id' => $request->kecamatan_id,
                'kelurahan_id' => $request->kelurahan_id,
                'pic' => null,
                'phone' => $request->phone,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'approved1' => 'need_approved',
                'approved2' => 'need_approved',
                'zip_code' => $request->zip_code,
                'is_active' => 0,
                'note' => $request->note,
            ]);

            if (!empty($request->password)) {
                $merchant->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            $ref_approval1 = ApprovalLogMerchant::where('merchant_id', $merchant->id)->where('step', 'approved1')->orderBy('id', 'desc')->first();

            $ref_approval2 = ApprovalLogMerchant::where('merchant_id', $merchant->id)->where('step', 'approved2')->orderBy('id', 'desc')->first();

            $approval_merchant1 = ApprovalLogMerchant::create([
                'merchant_id' => $merchant->id,
                'user_id' => auth()->user()->id,
                'status' => 'need_approved',
                'step' => 'approved1',
                'ref' => intval($ref_approval1->ref) + 1
            ]);

            $approval_merchant2 = ApprovalLogMerchant::create([
                'merchant_id' => $merchant->id,
                'user_id' => auth()->user()->id,
                'status' => 'need_approved',
                'step' => 'approved2',
                'ref' => intval($ref_approval2->ref) + 1,
            ]);

            $data_merchant_approve = [];

            //================= Identity Card Photo ======================
            if ($request->hasFile('identity_card_photo')) {
                $identity_card_file     = $request->file('identity_card_photo');
                $identity_card_name     = Str::random(15).'.'.$identity_card_file->extension();

                $data_merchant_approve['identity_card_photo'] = $identity_card_name;

                $identity_card_file->storeAs('public/backend/images/identity_card', $identity_card_name);

                if ($merchant_approve && $merchant_approve->identity_card) {
                     Storage::disk('local')->delete('public/backend/images/identity_card/' . $merchant_approve->identity_card);
                }
            }
            //============== End Indentity Card Photo ====================
            //======================= NPWP Photo =========================
            if ($request->hasFile('npwp_photo')) {
                $npwp_file              = $request->file('npwp_photo');
                $npwp_photo_name        = Str::random(15).'.'.$npwp_file->extension();

                $data_merchant_approve['npwp_photo'] = $npwp_photo_name;
                $npwp_file->storeAs('public/backend/images/npwp', $npwp_photo_name);

                if ($merchant_approve && $merchant_approve->npwp_photo) {
                     Storage::disk('local')->delete('public/backend/images/npwp/' . $merchant_approve->npwp_photo);
                }
            }
            //==================== End NPWP Photo ========================
            //================== Owner Outlet Photo ======================
            if ($request->hasFile('owner_outlet_photo')) {
                $owner_outlet_file      = $request->file('owner_outlet_photo');
                $owner_outlet_name      = Str::random(15).'.'.$owner_outlet_file->extension();

                $data_merchant_approve['owner_outlet_photo'] = $owner_outlet_name;
                $owner_outlet_file->storeAs('public/backend/images/owner_outlet', $owner_outlet_name);

                if ($merchant_approve && $merchant_approve->owner_outlet_photo) {
                    Storage::disk('local')->delete('public/backend/images/owner_outlet/' . $merchant_approve->owner_outlet_photo);
                }
            }
            //================ End Owner Outlet Photo ====================
            //================== Selfie KTP Photo ========================
            if ($request->hasFile('selfie_ktp_photo')) {
                $selfie_ktp_file        = $request->file('selfie_ktp_photo');
                $selfie_ktp_name        = Str::random(15).'.'.$selfie_ktp_file->extension();

                $data_merchant_approve['selfie_ktp_photo'] = $selfie_ktp_name;
                $selfie_ktp_file->storeAs('public/backend/images/selfie_ktp', $selfie_ktp_name);

                if ($merchant_approve && $merchant_approve->selfie_ktp_photo) {
                    Storage::disk('local')->delete('public/backend/images/selfie_ktp/' . $merchant_approve->selfie_ktp_photo);
                }
            }
            //================ End Selfie KTP Photo ======================
            //================== Outlet Photo ============================
            if ($request->hasFile('outlet_photo')) {
                $outlet_file            = $request->file('outlet_photo');
                $outlet_name            = Str::random(15).'.'.$outlet_file->extension();

                $data_merchant_approve['outlet_photo'] = $outlet_name;
                $outlet_file->storeAs('public/backend/images/outlet', $outlet_name);

                if ($merchant_approve && $merchant_approve->outlet_photo) {
                    Storage::disk('local')->delete('public/backend/images/outlet/' . $merchant_approve->outlet_photo);
                }
            }
            //================= End Outlet Photo =========================
            //================== In Outlet Photo =========================
            if ($request->hasFile('in_outlet_photo')) {
                $in_outlet_file         = $request->file('in_outlet_photo');
                $in_outlet_name         = Str::random(15).'.'.$in_outlet_file->extension();

                $data_merchant_approve['in_outlet_photo'] = $in_outlet_name;
                $in_outlet_file->storeAs('public/backend/images/in_outlet', $in_outlet_name);

                if ($merchant_approve && $merchant_approve->in_outlet_photo) {
                    Storage::disk('local')->delete('public/backend/images/in_outlet/' . $merchant_approve->in_outlet_photo);
                }
            }
            //================= End In Outlet Photo ======================
            //============== Surat Keterangan Domisili ==============
            if ($request->hasFile('certificate_of_domicile')) {
                $certificate_of_domicile_file         = $request->file('certificate_of_domicile');
                $certificate_of_domicile_name         = Str::random(15).'.'.$in_outlet_file->extension();
                $certificate_of_domicile_file->storeAs('public/backend/images/certificate_of_domicile', $certificate_of_domicile_name);

                $data_merchant_approve['certificate_of_domicile'] = $certificate_of_domicile_name;

                if ($merchant_approve && $merchant_approve->certificate_of_domicile) {
                    Storage::disk('local')->delete('public/backend/images/certificate_of_domicile/' . $merchant_approve->certificate_of_domicile);
                }
            }
            //============ End Surat Keterangan Domisili ============

            //================= Buku Rekening =====================
            if ($request->hasFile('copy_bank_account_book')) {
                $copy_bank_account_book_file         = $request->file('copy_bank_account_book');
                $copy_bank_account_book_name         = Str::random(15).'.'.$copy_bank_account_book_file->extension();
                $in_outlet_file->storeAs('public/backend/images/copy_bank_account_book', $copy_bank_account_book_name);

                $data_merchant_approve['copy_bank_account_book'] = $copy_bank_account_book_name;

                if ($merchant_approve && $merchant_approve->copy_bank_account_book) {
                    Storage::disk('local')->delete('public/backend/images/copy_bank_account_book/' . $merchant_approve->copy_bank_account_book);
                }
            }
            //================ End Buku Rekening ==================

            //================= Surat sewa / Bukti Kepemilikan =====================
            if ($request->hasFile('copy_proof_ownership')) {
                $copy_proof_ownership_file         = $request->file('copy_proof_ownership');
                $copy_proof_ownership_name         = Str::random(15).'.'.$in_outlet_file->extension();
                $copy_proof_ownership_file->storeAs('public/backend/images/copy_proof_ownership', $copy_proof_ownership_name);

                $data_merchant_approve['copy_proof_ownership'] = $copy_proof_ownership_name;

                if ($merchant_approve && $merchant_approve->copy_proof_ownership) {
                     Storage::disk('local')->delete('public/backend/images/copy_proof_ownership/' . $merchant_approve->copy_proof_ownership);
                }
            }
            //================ End Surat sewa / Bukti Kepemilikan ==================

            //================= SIUP / SURAT IJIN USAHA =====================
            if ($request->hasFile('siup_photo')) {
                $siup_photo_file         = $request->file('siup_photo');
                $siup_photo_name         = Str::random(15).'.'.$siup_photo_file->extension();
                $siup_photo_file->storeAs('public/backend/images/siup_photo', $siup_photo_name);

                $data_merchant_approve['siup_photo'] = $siup_photo_name;

                if ($merchant_approve && $merchant_approve->siup_photo) {
                     Storage::disk('local')->delete('public/backend/images/siup_photo/' . $merchant_approve->siup_photo);
                }
            }
            //================ End SIUP / SURAT IJIN USAHA ==================

            //================= TDP =====================
            if ($request->hasFile('tdp_photo')) {
                $tdp_photo_file         = $request->file('tdp_photo');
                $tdp_photo_name         = Str::random(15).'.'.$tdp_photo_file->extension();
                $tdp_photo_file->storeAs('public/backend/images/tdp_photo', $tdp_photo_name);

                $data_merchant_approve['tdp_photo'] = $tdp_photo_name;

                if ($merchant_approve && $merchant_approve->tdp_photo) {
                     Storage::disk('local')->delete('public/backend/images/tdp_photo/' . $merchant_approve->tdp_photo);
                }
            }
            //================ End TDP ==================

            //================= Akta Pendirian Perusahaan =====================
            if ($request->hasFile('copy_corporation_deed')) {
                $copy_corporation_deed_file         = $request->file('copy_corporation_deed');
                $copy_corporation_deed_name         = Str::random(15).'.'.$copy_corporation_deed_file->extension();
                $copy_corporation_deed_file->storeAs('public/backend/images/copy_corporation_deed', $copy_corporation_deed_name);

                $data_merchant_approve['copy_corporation_deed'] = $copy_corporation_deed_name;

                if ($merchant_approve && $merchant_approve->copy_corporation_deed) {
                    Storage::disk('local')->delete('public/backend/images/copy_corporation_deed/' . $merchant_approve->copy_corporation_deed);
                }
            }
            //================ End Akta Pendirian Perusahaan ==================

            //================= Akta Pengurus Perusahaan =====================
            if ($request->hasFile('copy_management_deed')) {
                $copy_management_deed_file         = $request->file('copy_management_deed');
                $copy_management_deed_name         = Str::random(15).'.'.$copy_management_deed_file->extension();
                $copy_management_deed_file->storeAs('public/backend/images/copy_management_deed', $copy_management_deed_name);

                $data_merchant_approve['copy_management_deed'] = $copy_corporation_deed_name;

                if ($merchant_approve && $merchant_approve->copy_management_deed) {
                    Storage::disk('local')->delete('public/backend/images/copy_management_deed/' . $merchant_approve->copy_management_deed);
                }
            }
            //================ End Akta Pengurus Perusahaan ==================

            //================= Copy SK Menkeh =====================
            if ($request->hasFile('copy_sk_menkeh')) {
                $copy_sk_menkeh_file         = $request->file('copy_sk_menkeh');
                $copy_sk_menkeh_name         = Str::random(15).'.'.$copy_sk_menkeh_file->extension();
                $copy_sk_menkeh_file->storeAs('public/backend/images/copy_sk_menkeh', $copy_sk_menkeh_name);

                $data_merchant_approve['copy_sk_menkeh'] = $copy_sk_menkeh_name;

                if ($merchant_approve && $merchant_approve->copy_sk_menkeh) {
                    Storage::disk('local')->delete('public/backend/images/copy_sk_menkeh/' . $merchant_approve->copy_sk_menkeh);
                }
            }
            //================ End Copy SK Menkeh ==================

            if (count($data_merchant_approve) > 0) {
                if ($merchant_approve) {
                    $merchant_approve->update($data_merchant_approve);
                } else {
                    $data_merchant_approve['merchant_id'] = $merchant->id;
                    $merchant_approve = MerchantApprove::create($data_merchant_approve);
                }
            }

            if ($merchant) {
                Alert::toast('Data Updated successfully', 'success');
                return redirect()->route('merchant.approval');
            } else {
                Alert::toast('Data gagal diupdate', 'error');
               return redirect()->route('merchant.approval');
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            Alert::toast('Data gagal diupdate', 'error');
            return redirect()->back();
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchant = Merchant::findOrFail($id);

        if ($merchant->approved1 == 'approved'){
            Alert::toast('Data Failed to delete, already approved 1', 'error');
            return redirect()->back();
        }

        if ($merchant->approved2 == 'approved') {
            Alert::toast('Data Failed to delete, already approved 2', 'error');
            return redirect()->back();
        }

        $transaction_check = Transaction::where('merchant_id', $merchant->id)->count();

        if ($transaction_check > 0) {
             Alert::toast('Data Failed to delete, Merchant have transaction', 'error');
            return redirect()->back();
        }

        try {
            if ($merchant->delete()) {
                Alert::toast('Data deleted successfully', 'success');
                return redirect()->back();
            } else {
                Alert::toast('Data deleted successfully', 'success');
                return redirect()->back();
            }
        } catch (Exception $e) {
            Alert::toast('Data failed to delete, already related', 'error');
            return redirect()->back();
        }
    }

    public function export_excel()
    {
        $merchant = Merchant::with([
                    'merchant_category',
                    'bank:id,bank_name',
                    'rek_pooling',
                    'bussiness',
                    'province',
                    'kecamatan',
                    'kelurahan',
                    'kabkot',
                ])
                ->where('is_active', 1)
                ->where('approved1', 'approved')
                ->where('approved2', 'approved')
                ->orderBy('id', 'desc')
                ->get();

        return Excel::download(new MerchantExport($merchant), 'merchant.xlsx');
    }

    public function toggleActive($merchantId)
    {
        try{
            Merchant::whereId($merchantId)->update(['is_active' => request('is_active')]);
            Alert::toast('Data successfully to delete', 'success');
        }catch(Exception $err){
            Alert::toast('Data failed to delete', 'error');
        }

        return response()->json(['success' => true]);
    }
}
