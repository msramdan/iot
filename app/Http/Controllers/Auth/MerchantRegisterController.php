<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Bussiness;
use App\Models\Bank;
use App\Models\MerchantsCategory;
use App\Models\MerchantApprove;
use App\Models\SettingApp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;
use Log;

class MerchantRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $banks = Bank::all();
        $bussinesses = Bussiness::all();
        $merchantCategories = MerchantsCategory::all();
        $provinces = DB::table('tbl_provinsi')->get();

        return view('auth.register', compact('banks', 'bussinesses', 'merchantCategories', 'provinces'));
    }

    public function register(Request $request)
    {
        $rules = [
            'merchant_name' => 'required|string|max:200',
            'email' => 'required|string|max:100|unique:merchants,email',
            'merchant_category_id' => 'required|numeric|exists:merchants_category,id',
            'bussiness_id' => 'required|numeric|exists:bussinesses,id',
            'bank_id' => 'required|numeric|exists:banks,id',
            'merchant_type' => 'required|string|in:bussiness,personal',
            'account_name' => 'required|string|max:200',
            'number_account' => 'required|string|max:100|regex:/[0-9]+/im',
            'phone' => 'required|string|max:100|min:11|regex:/[0-9]+/im',
            'address1' => 'required|string',
            'address2' => 'required|string',
            'provinsi_id' => 'required|numeric',
            'kabkot_id'=> 'required|numeric',
            'kecamatan_id' => 'required|numeric',
            'kelurahan_id' => 'required|numeric',
            'zip_code' => 'required|string|max:10',
            'note' => 'string|nullable',
            'identity_card_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'npwp_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'owner_outlet_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'selfie_ktp_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'outlet_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'in_outlet_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'certificate_of_domicile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'copy_bank_account_book' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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

        $validator = Validator::make(
            $request->all(),
            $rules
        );

        if ($validator->fails()) {
            Alert::toast('Data failed to save', 'error');
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $merchant = Merchant::create([
                'merchant_name' => $request->merchant_name,
                'email' => $request->email,
                'merchant_category_id' => $request->merchant_category_id,
                'bussiness_id' => $request->bussiness_id,
                'bank_id' => $request->bank_id,
                'provinsi_id' => $request->provinsi_id,
                'kabkot_id' => $request->kabkot_id,
                'kecamatan_id' => $request->kecamatan_id,
                'kelurahan_id' => $request->kelurahan_id,
                'merchant_type' => $request->merchant_type,
                'account_name' => $request->account_name,
                'number_account' => $request->number_account,
                'pic' => null,
                'phone' => $request->phone,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
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
               $merchants = Merchant::find($merchant->id);

               auth()->guard('merchant')->login($merchant);

               return redirect()->route('home');
            } else {
                Alert::toast('Data failed to save', 'error');
                return redirect()->back();
            }

        } catch(Exception $e) {
            Log::error($e);
            Alert::toast('Data failed to save', 'error');
            return redirect()->back()->withErrors('Failed to register');
        }
    }

    public function tos()
    {
        $setting = SettingApp::first();
        return view('merchant.tos.index', compact('setting'));
    }
}
