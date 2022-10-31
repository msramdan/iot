<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    public function index()
    {
        return view('merchant.dashboard.index');
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'old_password' => 'required',
                'password' => [
                    'required', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                        ->rules('confirmed')
                ],
            ]
        );

        if ($validator->fails()) {
             Alert::toast($validator->errors()->first(), 'error');
            return redirect()->back();
        }

        $merchant = Merchant::where('id', auth()->guard('merchant')->user()->id)->first();

        if (!Hash::check($request->password, $merchant->password)) {
            Alert::toast('Old password doesn`t match', 'error');
        }

        $merchant->update([
            'is_force_pass' => 1,
            'password' => Hash::make($request->password),
        ]);

        if ($merchant) {
            Alert::toast('Data Updated successfully', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Data Updated successfully', 'success');
            return redirect()->back();
        }
    }
}
