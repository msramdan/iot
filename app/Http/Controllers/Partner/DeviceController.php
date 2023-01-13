<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Cluster;
use App\Models\Device;
use App\Models\Subnet;
use App\Models\Subinstance;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Instance;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        $instance = Instance::where('id', auth()->guard('instances')->user()->id)->first();
        $cluster = Cluster::where('instance_id', $instance->id)->get();
        $subinstances = Subinstance::where('instance_id', $instance->id)->get();
        if (request()->ajax()) {
            $device = DB::table('devices')
                ->join('clusters', 'devices.cluster_id', '=', 'clusters.id')
                ->join('subinstances', 'clusters.subinstance_id', '=', 'subinstances.id')
                ->select('devices.*', 'clusters.name', 'subinstances.name_subinstance')
                ->where('appID', $instance->appID);

            if ($request->has('category_device') && !empty($request->category_device)) {
                $device = $device->where('category', $request->category_device);
            }
            if ($request->has('subinstance_id') && !empty($request->subinstance_id)) {
                $device = $device->where('subinstance_id', $request->subinstance_id);
            }
            if ($request->has('cluster_id') && !empty($request->cluster_id)) {
                $device = $device->where('cluster_id', $request->cluster_id);
            }

            $device = $device->orderBy('devices.id', 'desc')->get();
            return DataTables::of($device)
                ->addIndexColumn()
                ->addColumn('name_subinstance', function ($row) {
                    if (!$row->name_subinstance) {
                        return '-';
                    }
                    return $row->name_subinstance;
                })
                ->addColumn('cluster', function ($row) {
                    if (!$row->name) {
                        return '-';
                    }
                    return $row->name;
                })
                ->addColumn('action', 'partner.device._action')
                ->toJson();
        }
        return view('partner.device.index', compact('subinstances', 'cluster'));
    }

    public function detail($id)
    {
        $device = Device::where('id', $id)->first();
        return view('partner.device.detail', compact('device'));
    }
}
