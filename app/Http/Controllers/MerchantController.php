<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Bank;
use App\Models\Bussiness;
use App\Models\RekPooling;
use App\Models\MerchantsCategory;
use App\Models\ApprovalLogMerchant;
use App\Models\MdrLog;
use App\Models\Transaction;
use App\Models\MerchantApprove;
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
    public function index()
    {
        if (request()->ajax()) {
            $query = Merchant::with([
                'merchant_category',
                'bank:id,bank_name',
                'rek_pooling',
                'bussiness'
            ])
                ->where('is_active', 1)
                ->where('approved1', 'approved')
                ->where('approved2', 'approved')
                ->orderBy('id', 'desc')
                ->get();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('mid', function ($row) {
                    return $row->mid ? $row->mid : '-';
                })
                ->addColumn('merchant_category', function ($row) {
                    return $row->merchant_category->first()->merchants_category_name;
                })
                ->addColumn('bussiness', function ($row) {
                    return $row->bussiness->first()->bussiness_name;
                })
                ->addColumn('bank', function ($row) {
                    return $row->bank->first()->bank_name;
                })
                ->addColumn('rek_pooling', function ($row) {
                    return $row->rek_pooling->first()->rek_pooling_code;
                })
                ->addColumn('action', 'merchant._action')
                ->toJson();
        }
        return view('merchant.index');
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
        return view('merchant.create', compact('bank', 'merchant_category', 'bussiness', 'rek_pooling'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make(
            $request->all(),
            [
                'merchant_name' => 'required|string|max:200',
                'merchant_email' => 'required|string|max:100|unique:merchants,merchant_email',
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
                'city' => 'required|string|max:100',
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
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Data failed to save', 'error');
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $merchant = Merchant::create([
                'merchant_name' => $request->merchant_name,
                'merchant_email' => $request->merchant_email,
                'merchant_category_id' => $request->merchant_category_id,
                'bussiness_id' => $request->bussiness_id,
                'bank_id' => $request->bank_id,
                'account_name' => $request->account_name,
                'mdr' => $request->mdr,
                'number_account' => $request->number_account,
                'rek_pooling_id' => $request->rek_pooling_id,
                'pic' => null,
                'phone' => $request->phone,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
                'is_active' => $request->is_active == 'active' ? 1 : 0,
                'note' => $request->note,
                'password' => Hash::make($request->password),
            ]);

            $approval_merchant1 = ApprovalLogMerchant::create([
                'merchant_id' => $merchant->id,
                'user_id' => auth()->user()->id,
                'status' => 'need_approved',
                'step' => 'approved1',
                'ref' => 1
            ]);

            $approval_merchant2 = ApprovalLogMerchant::create([
                'merchant_id' => $merchant->id,
                'user_id' => auth()->user()->id,
                'status' => 'need_approved',
                'step' => 'approved2',
                'ref' => 1
            ]);

            $mdr_log = MdrLog::create([
                'merchant_id' => $merchant->id,
                'value_mdr' => floatval($request->mdr),
            ]);

            $identity_card_file     = $request->file('identity_card_photo');
            $npwp_file              = $request->file('npwp_photo');
            $owner_outlet_file      = $request->file('owner_outlet_photo');
            $selfie_ktp_file        = $request->file('selfie_ktp_photo');
            $outlet_file            = $request->file('outlet_photo');
            $in_outlet_file         = $request->file('in_outlet_photo');

            $identity_card_name     = Str::random(15).'.'.$identity_card_file->extension();
            $npwp_photo_name        = Str::random(15).'.'.$npwp_file->extension();
            $owner_outlet_name      = Str::random(15).'.'.$owner_outlet_file->extension();
            $selfie_ktp_name        = Str::random(15).'.'.$selfie_ktp_file->extension();
            $outlet_name            = Str::random(15).'.'.$outlet_file->extension();
            $in_outlet_name         = Str::random(15).'.'.$in_outlet_file->extension();

            $identity_card_file->storeAs('public/backend/images/identity_card', $identity_card_name);
            $npwp_file->storeAs('public/backend/images/npwp', $npwp_photo_name);
            $owner_outlet_file->storeAs('public/backend/images/owner_outlet', $owner_outlet_name);
            $selfie_ktp_file->storeAs('public/backend/images/selfie_ktp', $selfie_ktp_name);
            $outlet_file->storeAs('public/backend/images/outlet', $outlet_name);
            $in_outlet_file->storeAs('public/backend/images/in_outlet', $in_outlet_name);

            $merchant_approve = MerchantApprove::create([
                'merchant_id' => $merchant->id,
                'identity_card_photo' => $identity_card_name,
                'npwp_photo' => $npwp_photo_name,
                'owner_outlet_photo' => $owner_outlet_name,
                'selfie_ktp_photo' => $selfie_ktp_name,
                'outlet_photo' => $outlet_name,
                'in_outlet_photo' => $in_outlet_name,
            ]);

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
        ])->findOrFail($id);

        return view('merchant.show', compact('merchant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merchant = Merchant::findOrFail($id);
        $bank = Bank::all();
        $merchant_category = MerchantsCategory::all();
        $bussiness = Bussiness::all();
        $rek_pooling = RekPooling::all();
        return view('merchant.edit', compact('merchant', 'bank', 'merchant_category', 'bussiness', 'rek_pooling'));
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
        $validator = validator::make(
            $request->all(),
            [
                'merchant_name' => 'required|string|max:200',
                'merchant_email' => 'required|string|max:100|unique:merchants,merchant_email,' . $id,
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
                'city' => 'required|string|max:100',
                'zip_code' => 'required|string|max:10',
                'note' => 'string',
                'identity_card_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'npwp_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'owner_outlet_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'selfie_ktp_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'outlet_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'in_outlet_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'password' => [
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                ],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $merchant = Merchant::findOrFail($id);

        DB::beginTransaction();

        try {
            if (isset($request->mdr) && !empty($request->mdr) && (floatval($merchant->mdr) != floatval($request->mdr))) {
                $mdr_log = MdrLog::create([
                    'merchant_id' => $merchant->id,
                    'value_mdr' => floatval($request->mdr),
                ]);
            }

            $merchant->update([
                'merchant_name' => $request->merchant_name,
                'merchant_email' => $request->merchant_email,
                'merchant_category_id' => $request->merchant_category_id,
                'bussiness_id' => $request->bussiness_id,
                'bank_id' => $request->bank_id,
                'account_name' => $request->account_name,
                'mdr' => $request->mdr,
                'number_account' => $request->number_account,
                'rek_pooling_id' => $request->rek_pooling_id,
                'pic' => null,
                'phone' => $request->phone,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'approved1' => 'need_approved',
                'approved2' => 'need_approved',
                'city' => $request->city,
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
            $merchant_approve = MerchantApprove::where('merchant_id', $merchant->id)->first();

            if (!$merchant_approve) {
                Alert::toast('Merchant Approve data not found', 'error');
                return redirect()->route('merchant.approval');
            }

            if ($request->hasFile('identity_card_photo')) {
                $identity_card_file     = $request->file('identity_card_photo');
                $identity_card_name     = Str::random(15).'.'.$identity_card_file->extension();

                $data_merchant_approve['identity_card_photo'] = $identity_card_name;

                $identity_card_file->storeAs('public/backend/images/identity_card', $identity_card_name);

                Storage::disk('local')->delete('public/backend/images/identity_card/' . $merchant_approve->identity_card);
            }

            if ($request->hasFile('npwp_file')) {
                $npwp_file              = $request->file('npwp_photo');
                $npwp_photo_name        = Str::random(15).'.'.$npwp_file->extension();

                $data_merchant_approve['npwp_photo'] = $npwp_photo_name;
                $npwp_file->storeAs('public/backend/images/npwp', $npwp_photo_name);

                Storage::disk('local')->delete('public/backend/images/npwp/' . $merchant_approve->npwp_photo);
            }

            if ($request->hasFile('owner_outlet_file')) {
                $owner_outlet_file      = $request->file('owner_outlet_photo');
                $owner_outlet_name      = Str::random(15).'.'.$owner_outlet_file->extension();

                $data_merchant_approve['owner_outlet_photo'] = $owner_outlet_name;
                $owner_outlet_file->storeAs('public/backend/images/owner_outlet', $owner_outlet_name);

                Storage::disk('local')->delete('public/backend/images/owner_outlet/' . $merchant_approve->owner_outlet_photo);
            }

            if ($request->hasFile('selfie_ktp_photo')) {
                $selfie_ktp_file        = $request->file('selfie_ktp_photo');
                $selfie_ktp_name        = Str::random(15).'.'.$selfie_ktp_file->extension();

                $data_merchant_approve['selfie_ktp_photo'] = $selfie_ktp_name;
                $selfie_ktp_file->storeAs('public/backend/images/selfie_ktp', $selfie_ktp_name);

                Storage::disk('local')->delete('public/backend/images/selfie_ktp/' . $merchant_approve->selfie_ktp_photo);
            }

            if ($request->hasFile('outlet_file')) {
                $outlet_file            = $request->file('outlet_photo');
                $outlet_name            = Str::random(15).'.'.$outlet_file->extension();

                $data_merchant_approve['outlet_photo'] = $outlet_name;
                $outlet_file->storeAs('public/backend/images/outlet', $outlet_name);

                Storage::disk('local')->delete('public/backend/images/outlet/' . $merchant_approve->outlet_photo);
            }

            if ($request->hasFile('in_outlet_file')) {
                $in_outlet_file         = $request->file('in_outlet_photo');
                $in_outlet_name         = Str::random(15).'.'.$in_outlet_file->extension();

                $data_merchant_approve['in_outlet_photo'] = $in_outlet_name;
                $in_outlet_file->storeAs('public/backend/images/in_outlet', $in_outlet_name);

                Storage::disk('local')->delete('public/backend/images/in_outlet/' . $merchant_approve->in_outlet_photo);
            }

            if (count($data_merchant_approve) > 0) {
                $merchant_approve->update($data_merchant_approve);
            }

            if ($merchant) {
                Alert::toast('Data Updated successfully', 'success');
                return redirect()->route('merchant.approval');
            } else {
                Alert::toast('Data Updated to save', 'error');
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
                // return redirect()->route('merchant.index');
                return redirect()->back();
            } else {
                Alert::toast('Data deleted successfully', 'success');
                // return redirect()->route('merchant.index');
                return redirect()->back();
            }
        } catch (Exception $e) {
            Alert::toast('Data failed to delete, already related', 'error');
            return redirect()->back();
        }
    }

    public function need_approved()
    {
        if (request()->ajax()) {
            $query = Merchant::with([
                'merchant_category',
                'bank:id,bank_name',
                'rek_pooling',
                'bussiness',
            ])
                ->where('is_active', 0)
                ->where('approved1', 'need_approved')
                ->where('approved2', 'need_approved')
                ->orderBy('id', 'desc')
                ->get();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('merchant_category', function ($row) {
                    return $row->merchant_category->first()->merchants_category_name;
                })
                ->addColumn('bussiness', function ($row) {
                    return $row->bussiness->first()->bussiness_name;
                })
                ->addColumn('bank', function ($row) {
                    return $row->bank->first()->bank_name;
                })
                ->addColumn('rek_pooling', function ($row) {
                    return $row->rek_pooling->first()->rek_pooling_code;
                })
                ->addColumn('action', 'merchant._action')
                ->toJson();
        }
        return view('merchant.need_approved');
    }

    public function reject()
    {
        if (request()->ajax()) {
            $query = Merchant::with([
                'merchant_category',
                'bank:id,bank_name',
                'rek_pooling',
                'bussiness',
            ])
                ->where('is_active', 0)
                ->where(function ($q) {
                    $q->where('approved1', 'approved')
                        ->orwhere('approved1', 'rejected');
                })->where(function ($q) {
                    $q->where('approved2', 'approved')
                        ->orwhere('approved2', 'rejected');
                })
                ->orderBy('id', 'desc')
                ->get();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('merchant_category', function ($row) {
                    return $row->merchant_category->first()->merchants_category_name;
                })
                ->addColumn('bussiness', function ($row) {
                    return $row->bussiness->first()->bussiness_name;
                })
                ->addColumn('bank', function ($row) {
                    return $row->bank->first()->bank_name;
                })
                ->addColumn('rek_pooling', function ($row) {
                    return $row->rek_pooling->first()->rek_pooling_code;
                })
                ->addColumn('action', 'merchant._action')
                ->toJson();
        }
        return view('merchant.rejected');
    }

    public function approve(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'approval' => 'required|string',
                'merchant_id' => 'required|numeric',
                'status' => 'required|string|in:approved,rejected,'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->error()->first()], 422);
        }

        $text_status = '';

        if ($request->status == 'approved') {
            $text_status = 'approve';
        } elseif ($request->status == 'rejected') {
            $text_status = 'rejected';
        }

        DB::beginTransaction();
        try {
            $merchant = Merchant::where('id', $request->merchant_id)->first();

            if (!$merchant) {
                return response()->json(['success' => false, 'message' => 'Merchant not found'], 500);
            }

            $approval_merchant = ApprovalLogMerchant::where('merchant_id', $request->merchant_id)
                ->where('status', 'need_approved');

            if (isset($request->approval) && $request->approval == 'approved1') {
                $approval_merchant =  $approval_merchant->where('step', 'approved1');
            }

            if (isset($request->approval) && $request->approval == 'approved2') {
                $approval_merchant =  $approval_merchant->where('step', 'approved1');
            }

            $approval_merchant = $approval_merchant->orderBy('id', 'desc')->first();

            if (!$approval_merchant) {
                return response()->json(['success' => false, 'message' => 'Failed to '.$text_status.' merchant'], 500);
            }

            if ($request->approval == 'approved1') {
                $merchant->update([
                    'approved1' => $request->status,
                ]);
            } elseif($request->approval == 'approved2') {
                $merchant->update([
                    'approved2' => $request->status,
                ]);
            }


            $approval_merchant = $approval_merchant->update([
                'status' => $request->status
            ]);

            return response()->json(['success' => true, 'message' => 'Success to '.$text_status.' merchant']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        } finally {
            DB::commit();
        }
    }
}
