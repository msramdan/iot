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

        return view('auth.register', compact('banks', 'bussinesses', 'merchantCategories'));
    }

    public function register(Request $request)
    {
         $validator = Validator::make(
            $request->all(),
            [
                'merchant_name' => 'required|string|max:200',
                'email' => 'required|string|max:100|unique:merchants,email',
                'merchant_category_id' => 'required|numeric|exists:merchants_category,id',
                'bussiness_id' => 'required|numeric|exists:bussinesses,id',
                'bank_id' => 'required|numeric|exists:banks,id',
                'account_name' => 'required|string|max:200',
                'number_account' => 'required|string|max:100|regex:/[0-9]+/im',
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
                'email' => $request->email,
                'merchant_category_id' => $request->merchant_category_id,
                'bussiness_id' => $request->bussiness_id,
                'bank_id' => $request->bank_id,
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

            if (count($data_merchant_approve) > 0) {
                $merchant_approve = MerchantApprove::create($data_merchant_approve);
            }

            if ($merchant) {
               // Alert::toast('Data Successfully Created Please check the Merchant Approved page', 'success');
               $merchants = Merchant::find($merchant->id);

               auth()->guard('merchant')->login($merchant);

               return redirect()->route('home');
            } else {
                //Alert::toast('Data failed to save', 'error');
                return redirect()->back();
            }

        } catch(Exception $e) {
            Log::error($e);
            //Alert::toast('Data failed to save', 'error');
            return redirect()->back()->withErrors('Failed to register');
        }
    }
}
