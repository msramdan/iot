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
use Exception;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

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
                'password' => [
                    'required', 'confirmed', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                ],
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

    public function update_profile(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|string|max:50|unique:users,name, " . $user->id,
                'email' => "required|email|unique:users,email," . $user->id,
                'password' => "confirmed",
                'role' => "required"
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
            $user = User::findOrFail($user->id);
            if ($request->password == "" || $request->password == null) {
                $user->update([
                    'name'   => $request->name,
                    'email'   => $request->email,
                ]);
            } else {
                $user->update([
                    'name'   => $request->name,
                    'email'   => $request->email,
                    'password'   => Hash::make($request->password),
                ]);
            }
            $user->syncRoles($request->role);
            Alert::toast('Profile successfully updated', 'success');
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Failed to update profile', 'error');
            return redirect()->route('user.index');
        } finally {
            DB::commit();
        }
    }
}
