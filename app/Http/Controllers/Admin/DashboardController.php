<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Instance;
use App\Models\Subinstance;
use App\Models\Cluster;
use App\Models\Rawdata;
use App\Models\Ticket;
use App\Models\Device;
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

    // public function index(Request $request)
    // {
    //     $instances = Instance::get();
    //     $total_instance = Instance::count();
    //     $total_subinstance = SubInstance::count();
    //     $total_cluster = Cluster::count();
    //     $total_gateway = count(Rawdata::groupBy('gwid')->get());

    //     return view('admin.dashbaord.index', compact('instances', 'total_instance', 'total_subinstance', 'total_cluster', 'total_gateway'));
    // }

    public function index()
    {
        $instances = Instance::get();
        $total_instance = Instance::count();
        $total_subinstance = SubInstance::count();
        $total_cluster = Cluster::count();
        $total_gateway = count(Rawdata::groupBy('gwid')->get());
        $instances = Instance::get();
        $ticket =Ticket::orderBy('id', 'desc')->limit(9)->get();
        $ticketOpen = Ticket::where('is_open', 1)->count();
        $ticketClose = Ticket::where('is_open', 0)->count();
        // ===
        $TotalByBrances =  "SELECT `instance_name`, count(*) AS total FROM `devices` INNER JOIN `instances` ON `devices`.`appID` = `instances`.`appID` GROUP BY `devices`.`appID`";
        $TotalByBrances = DB::select($TotalByBrances);
        //dd($TotalByBrances);
        // ===
        $TotalByCluster =  "SELECT clusters.*, count(*) AS total FROM `devices` INNER JOIN `clusters` ON `devices`.`cluster_id` = `clusters`.`id` GROUP BY `devices`.`cluster_id`";
        $TotalByCluster = DB::select($TotalByCluster);
        // ===
        $TotalByLocation =  "SELECT `kabupaten_kota`, count(*) AS total FROM `devices`
        INNER JOIN `instances` ON `devices`.`appID` = `instances`.`appID`
        INNER JOIN `tbl_kabkot` ON `instances`.`city_id` = `tbl_kabkot`.`id`
        GROUP BY `instances`.`city_id`";
        $TotalByLocation = DB::select($TotalByLocation);
        // ===
        $countDevice = Device::count();
        $countDeviceError = Device::where('status','=','error')->count();
        // ===
        $countBranches = Instance::count();
        $countBranchesError = "SELECT * FROM devices WHERE status='error' GROUP BY appID";
        $selectBranchesError = DB::select($countBranchesError);
        // ===
        $countCluster = Cluster::count();
        $countClusterError = "SELECT * FROM devices WHERE status='error' GROUP BY cluster_id";
        $selectClusterError = DB::select($countClusterError);

        return view('admin.dashbaord.index',[
        'total_instance' => $total_instance,
        'total_subinstance' => $total_subinstance,
        'total_cluster' => $total_cluster,
        'total_gateway' => $total_gateway,
        'instances' => $instances,
        'ticket' => $ticket,
        'ticketOpen' => $ticketOpen,
        'ticketClose' => $ticketClose,
        'TotalByBrances' => $TotalByBrances,
        'TotalByCluster' => $TotalByCluster,
        'TotalByLocation' => $TotalByLocation,
        'countDevice' => $countDevice,
        'countDeviceError' => $countDeviceError,
        'chartPersentage' => round((($countDevice - $countDeviceError) * 100) / $countDevice,2) ,
        'countBranches' => $countBranches,
        'selectBranchesError' => count($selectBranchesError),
        'chartPersentageBranches' => round((($countBranches - count($selectBranchesError)) * 100) / $countBranches,2),
        'countCluster' => $countCluster,
        'selectClusterError' => count($selectClusterError),
        'chartPersentageCluster' =>round((($countCluster - count($selectClusterError)) * 100) / $countCluster,2) ,
    ]);
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
