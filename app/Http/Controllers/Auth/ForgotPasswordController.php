<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\Instance;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use RealRashid\SweetAlert\Facades\Alert;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showForgetPasswordForm()
    {
        return view('auth.instance_password.email');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|exists:merchants'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $merchant = Instance::where('email', $request->email)->first();

        if (!$merchant) {
            return redirect()->back()->withErrors(['email' => 'email account doesn`t exists!']);
        }

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($request->email)->send(new ResetPassword($token, $merchant));

        Alert::toast('We have e-mailed your password reset link!', 'success');
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token) {
        return view('auth.merchant_password.password', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $updatePassword = DB::table('password_resets')
                            ->where([
                            'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            Alert::toast('Invalid token!', 'error');
            return back()->withErrors('error', 'Invalid token!');
        }

        $user = Instance::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        Alert::toast('Your password has been changed!', 'success');
        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
