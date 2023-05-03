<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Instance;
use App\Models\Subinstance;
use App\Models\Cluster;
use App\Models\Rawdata;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $instances = Instance::get();
        $total_instance = Instance::count();
        $total_subinstance = SubInstance::count();
        $total_cluster = Cluster::count();
        $total_gateway = count(Rawdata::groupBy('gwid')->get());

        return view('admin.dashbaord.index', compact('instances', 'total_instance', 'total_subinstance', 'total_cluster', 'total_gateway'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'current_password' => ['required', new MatchOldPassword],
                'password' => ['required', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()],
                'password_confirmation' => ['required', 'same:password'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $user = User::findOrfail(auth()->user()->id);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            Alert::toast('Change password successfully', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Failed to Change password', 'success');
            return redirect()->back();
        }
    }

    public function change_profile(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|string|max:50|unique:users,name, " . auth()->user()->id,
                'email' => "required|email|unique:users,email," . auth()->user()->id,
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
            $user = User::findOrFail(auth()->user()->id);
            $user->update([
                'name'   => $request->name,
                'email'   => $request->email,
            ]);
            Alert::toast('Profile successfully updated', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Failed to update profile', 'error');
            return redirect()->back();
        } finally {
            DB::commit();
        }
    }
}
