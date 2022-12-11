<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cluster;
use App\Models\Device;
use App\Models\Instance;
use App\Models\Subinstance;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    public function index()
    {
        $total_subinstance = Subinstance::whereInstanceId(auth()->id())->count();
        $cluster = Cluster::whereInstanceId(auth()->id())->get();
        $total_device = Device::whereIn('cluster_id', $cluster->pluck('id'))->count();
        $total_cluster = $cluster->count();


       return view('partner.dashboard.index', compact('total_subinstance', 'total_cluster', 'total_device'));
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

        $instance = Instance::where('id', auth()->guard('instances')->user()->id)->first();

        if (!Hash::check($request->password, $instance->password)) {
            Alert::toast('Old password doesn`t match', 'error');
        }

        $instance->update([
            'password' => Hash::make($request->password),
        ]);

        if ($instance) {
            Alert::toast('Data Updated successfully', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Data Updated successfully', 'success');
            return redirect()->back();
        }
    }
}
