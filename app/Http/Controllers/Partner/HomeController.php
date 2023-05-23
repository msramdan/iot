<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cluster;
use App\Models\Device;
use App\Models\Instance;
use App\Models\Subinstance;
use App\Models\OperationalTime;
use App\Models\Bussiness;
use App\Models\District;
use App\Models\Province;
use App\Models\City;
use App\Models\Ticket;
use App\Models\Village;
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
        $instance = Instance::where('id', auth()->guard('instances')->user()->id)->first();
        $instances = Instance::where('id', $instance->id)->get();
        $subinstances = Subinstance::whereInstanceId(auth()->id())->get();
        $total_subinstance = Subinstance::whereInstanceId(auth()->id())->count();
        $clusters = Cluster::whereInstanceId(auth()->id())->get();
        $devices = Device::whereIn('cluster_id', $clusters->pluck('id'))->get();
        $total_device = Device::whereIn('cluster_id', $clusters->pluck('id'))->count();
        $total_cluster = $clusters->count();
        $tickets = Ticket::whereAuthorId(auth()->id())->orderBy('created_at', 'DESC')->get();
        $ticketsByStatus = Ticket::select('status as name', DB::raw('COUNT(*) as y'))->whereAuthorId(auth()->id())->groupBy('status')->get();
        $jsonPercentageTicketByStatus = json_encode($ticketsByStatus);
        $devicesByType = Device::select('category', DB::raw('COUNT(*) as qty'))->where('appID', $instance->appID)->groupBy('category')->get();
        $devicesBySubInstance = Device::select('subinstances.name_subinstance as name', DB::raw('COUNT(*) as qty'), 'subinstances.id as subinstance_id')
            ->join('clusters', 'devices.cluster_id', '=', 'clusters.id')
            ->join('subinstances', 'clusters.subinstance_id', '=', 'subinstances.id')
            ->where('devices.appID', $instance->appID)
            ->groupBy('clusters.subinstance_id')
            ->get();
        $devicesByLocation = Device::select('tbl_kabkot.kabupaten_kota as name', DB::raw('COUNT(*) as qty'), 'tbl_kabkot.id as tbl_kabkot_id')
            ->leftJoin('instances', 'instances.appID', '=', 'devices.appID')
            ->leftJoin('tbl_kabkot', 'tbl_kabkot.id', '=', 'instances.city_id')
            ->where('instances.appID', $instance->appID)
            ->groupBy('tbl_kabkot.id')
            ->get();


        return view('partner.dashboard.index', compact('subinstances', 'total_subinstance', 'total_cluster', 'total_device', 'tickets', 'ticketsByStatus', 'devicesByType', 'devicesBySubInstance', 'devicesByLocation', 'instances', 'jsonPercentageTicketByStatus', 'clusters', 'devices'));
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

    public function profile()
    {
        $instance = Instance::where('id', auth()->guard('instances')->user()->id)->first();
        $provinces = Province::all();
        $bussinesses = Bussiness::all();
        $city = City::where('id', $instance->city_id)->get();
        $village = Village::where('id', $instance->village_id)->get();
        $district = District::where('id', $instance->district_id)->get();

        return view('partner.profile.index', compact(
            'instance',
            'provinces',
            'bussinesses',
            'city',
            'village',
            'district',
        ));
    }
}
