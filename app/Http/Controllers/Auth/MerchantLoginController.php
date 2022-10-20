<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MerchantLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.merchant_login');
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

        if (Auth::guard('merchant')->attempt($request->only('email', 'password'))) {
            return redirect('/');
        }

        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function logout()
    {
        Auth::guard('merchant')->logout();

        return redirect('/');
    }


}
