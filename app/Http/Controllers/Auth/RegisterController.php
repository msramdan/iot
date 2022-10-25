<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Merchant;
use App\Models\Bussiness;
use App\Models\Bank;
use App\Models\MerchantsCategory;
use App\Models\MerchantApprove;
use App\Models\SettingApp;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Exception;
use Log;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'merchant_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'regex:/[0-9]+/im', 'max:15', 'min:10'],
            'city' => ['required', 'string'],
            'zip_code' => ['required', 'string'],
            'address1' => ['required', 'string'],
            'address2' => ['required', 'string'],
            'merchant_category_id' => ['required', 'numeric', 'exists:merchants_category,id'],
            'bussiness_id' => ['required', 'numeric', 'exists:bussinesses,id'],
            'bank_id' => ['required', 'numeric', 'exists:banks,id'],
            'account_name' => ['required', 'string', 'max:100'],
            'number_account' => ['required', 'string', 'max:100', 'regex:/[0-9]+/im'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($data)->withErrors($validator);
        }

        return $validator;
    }

    public function showRegistrationForm()
    {
        $banks = Bank::all();
        $bussinesses = Bussiness::all();
        $merchantCategories = MerchantsCategory::all();

        return view('auth.register', compact('banks', 'bussinesses', 'merchantCategories'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
         try {
            $merchant = Merchant::create([
                'merchant_name' => $data['merchant_name'],
                'email' => $data['email'],
                'merchant_category_id' => $data['merchant_category_id'],
                'bussiness_id' => $data['bussiness_id'],
                'bank_id' => $data['bank_id'],
                'account_name' => $data['account_name'],
                'mdr' => 0,
                'number_account' => $data['number_account'],
                'pic' => null,
                'phone' => $data['phone'],
                'address1' => $data['address1'],
                'address2' => $data['address2'],
                'city' => $data['city'],
                'zip_code' => $data['zip_code'],
                'password' => Hash::make($data['password']),
            ]);

            $data_merchant_approve['merchant_id'] = $merchant->id;

            //==================== Foto KTP ========================
            if ($data['identity_card_photo']) {
                $identity_card_file     = $data['identity_card_photo'];
                $identity_card_name     = Str::random(15).'.'.$identity_card_file->extension();
                $identity_card_file->storeAs('public/backend/images/identity_card', $identity_card_name);

                $data_merchant_approve['identity_card_photo'] = $identity_card_name;
            }
            //================== End Foto KTP ======================

            //==================== NPWP Photo =======================
            if ($data['npwp_photo']) {
                $npwp_file              = $data['npwp_photo'];
                $npwp_photo_name        = Str::random(15).'.'.$npwp_file->extension();
                $npwp_file->storeAs('public/backend/images/npwp', $npwp_photo_name);

                $data_merchant_approve['npwp_photo'] = $npwp_photo_name;
            }
           //==================== End NPWP Photo ====================

           //=================== Owner outlet photo =================
            if ($data['owner_outlet_photo']) {
                $owner_outlet_file      = $data['owner_outlet_photo'];
                $owner_outlet_name      = Str::random(15).'.'.$owner_outlet_file->extension();
                $owner_outlet_file->storeAs('public/backend/images/owner_outlet', $owner_outlet_name);

                $data_merchant_approve['owner_outlet_photo'] = $owner_outlet_name;
            }
            //================= End Owner outlet photo ==============

            //================ Selfie KTP Photo =====================
            if ($data['selfie_ktp_photo']) {
                $selfie_ktp_file        = $data['selfie_ktp_photo'];
                $selfie_ktp_name        = Str::random(15).'.'.$selfie_ktp_file->extension();
                $selfie_ktp_file->storeAs('public/backend/images/selfie_ktp', $selfie_ktp_name);

                $data_merchant_approve['selfie_ktp_photo'] = $selfie_ktp_name;
            }
            //================= End Selfie KTP Photo ================

            //================== Outlet Photo =======================
            if ($data['outlet_photo']) {
                $outlet_file            = $data['outlet_photo'];
                $outlet_name            = Str::random(15).'.'.$outlet_file->extension();
                $outlet_file->storeAs('public/backend/images/outlet', $outlet_name);

                $data_merchant_approve['outlet_photo'] = $outlet_name;
            }
            //================= End Outlet Photo ====================

            //================= In Outlet Photo =====================
            if ($data['in_outlet_photo']) {
                $in_outlet_file         = $data['in_outlet_photo'];
                $in_outlet_name         = Str::random(15).'.'.$in_outlet_file->extension();
                $in_outlet_file->storeAs('public/backend/images/in_outlet', $in_outlet_name);

                $data_merchant_approve['in_outlet_photo'] = $in_outlet_name;
            }
            //================ End In Outlet Photo ==================

            if (count($data_merchant_approve) > 0) {
                $merchant_approve = MerchantApprove::create($data_merchant_approve);
            }

            if ($merchant) {
                $merchants = Merchant::with('merchant_approve')->where('id', $merchant->id)->first();
                //$this->guard()->login($merchants);
                return redirect('/');
            } else {
                return redirect()->back();
            }
        } catch(Exception $e) {
            Log::error($e);
            return redirect()->back();
        }
    }
}
