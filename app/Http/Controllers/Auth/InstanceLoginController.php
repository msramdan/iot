<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use App\Models\Instance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class InstanceLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.partner_login');
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

        if (Auth::guard('instances')->attempt($request->only('email', 'password'))) {
            return redirect('/');
        }

        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function logout()
    {
        Auth::guard('instances')->logout();

        return redirect('/');
    }
}
