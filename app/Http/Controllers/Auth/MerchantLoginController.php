<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Merchant;
use App\Models\OTP;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOTP;
use Illuminate\Support\Facades\Session;
class MerchantLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.merchant_login');
    }

    public function showOTPForm()
    {
        if (Session::has('email') && Session::has('password')) {
            return view('auth.merchant_otp');
        }

        return redirect()->route('login');
    }

    public function handleLogin(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|string',
                'password' => 'required'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $credentials = $request->only('email', 'password');

        $merchant = Merchant::where('email', $request->email)->first();

        if (!Hash::check($request->password, $merchant->password)) {
            return redirect()->back()->withErrors(['password' => "These Credentials doesn't match our record"]);
        }

        if ($merchant) {
            $otp = $this->generate_otp($request);

            Mail::to($request->email)->send(new SendOTP($merchant, $otp->otp_number));

            if ($otp) {
                Alert::toast("Success send OTP number to your email, check your email if you're not recieve any email press button resend email", "success");
                return redirect()->route('login.otp');
            }

            Alert::toast('Failed to generate OTP, please try login again');
            return redirect()->back();
        }

        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function handleOTP(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|string|exists:merchants,email',
                'otp_number' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $merchant = Merchant::where('email', $request->email)->first();

        if (!$merchant) {
            Alert::toast('Merchant Not found', 'error');
            return redirect()->back()->withErrors('email', 'merchant not found');
        }

        $otp = OTP::where('otp_number', $request->otp_number)->first();

        if (!$otp) {
            return redirect()->back()->withErrors(['otp_number' => 'OTP Number not valid']);
        }
        if (now()->isBefore($otp->expired_date)) {
            return redirect()->back()->withErrors(['otp_number' => 'Your OTP number is expired, please regenerate the OTP number']);
        }
        if ($otp->is_used == 1) {
            return redirect()->back()->withErrors(["otp_number" => "Your OTP number is already used, please re-generate the OTP number"]);
        }

        $otp->update([
            'expired_date' => Carbon::now(),
            'is_used' => 1,
        ]);

        if (Auth::guard('merchant')->attempt([
            'email' => session('email'),
            'password' => session('password')
        ])) {
            session(['is_valid_otp' => 1]);
            return redirect('/');
        }

        return redirect()->back()->withErrors(['otp_number' => 'OTP Number not valid']);
    }

    public function regenerate_otp(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'otp_number' => 'required|numeric|digits:6',
                'email' => 'required|email'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator, 422);
        }

        if (!$request->session()->has('email') && !$request->session()->has('password')) {
            Alert::toast('Please login to re-generate OTP number', 'error');
            return redirect()->route('login');
        }

        $otp = OTP::where('otp_number', $request->otp_number)->first();

        if (!$otp) {
            Alert::toast('OTP number not found, please try login again', 'error');
            return redirect()->route('login');
        }

        if (now()->isBefore($otp->regenerate_time)) {
            Alert::toast('Please wait until 2 minute to re-generate OTP number', 'error');
            return redirect()->back();
        }

        $merchant = Merchant::where('email', $request->email)->first();

        if (!$merchant) {
            Alert::toast('Merchant Not found', 'error');
            return redirect()->back();
        }

        $otp = $this->generate_otp($request);

        Mail::to($request->email)->send(new SendOTP($merchant, $otp->otp_number));

        if ($otp) {
           Alert::toast("Success send OTP number to your email, check your email if you're not recieve any email press button resend email", "success");
           return redirect()->route('login.otp');
        }

        Alert::toast('Failed to re-generate OTP, please try login again');
        return redirect()->back();
    }

    public function generate_otp($request)
    {
        $merchant = Merchant::where('email', $request->email)->first();

        $otp = OTP::create([
            'merchant_id' => $merchant->id,
            'email' => $merchant->email,
            'otp_number' => mt_rand(000000,999999),
            'is_used' => 0,
            'expired_date' => Carbon::now()->addMinute(5),
            'regenerate_time' => Carbon::now()->addMinutes(2),
        ]);

        session([
            "otp_number" => $otp->otp_number,
            "expired_date" => $otp->expired_date,
            "email" => $merchant->email,
            "merchant_id" => $merchant->id,
            "password"=> $request->password,
            'regenerate_time' => $otp->regenerate_time
        ]);

        return $otp;
    }

    public function logout(Request $request)
    {
        Auth::guard('merchant')->logout();
        $request->session()->forget([
            "otp_number",
            "expired_date",
            "email",
            "merchant_id",
            "password",
            'regenerate_time',
            'is_valid_otp'
        ]);

        return redirect('/');
    }


}
