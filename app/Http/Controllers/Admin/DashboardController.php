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
        $total_instance = Instance::count();
        $total_subinstance = SubInstance::count();
        $total_cluster = Cluster::count();
        $total_gateway = count(Rawdata::groupBy('gwid')->get());

        return view('admin.dashbaord.index', compact('total_instance', 'total_subinstance', 'total_cluster', 'total_gateway'));
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
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

        $user = User::findOrfail(auth()->user()->id);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            Alert::toast('Data Updated successfully', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Data Updated successfully', 'success');
            return redirect()->back();
        }
    }

}
