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
        $arrLocation = Device::select('tbl_kabkot.id as id', 'tbl_kabkot.kabupaten_kota as name')->leftJoin('instances', 'instances.appID', '=', 'devices.appID')->leftJoin('tbl_kabkot', 'tbl_kabkot.id', 'instances.city_id')->where('devices.appID', $instance->appID)->groupBy('instances.city_id')->get();

        if (request()->ajax()) {
            $device = DB::table('devices')
                ->leftJoin('instances', 'instances.appID', '=', 'devices.appID')
                ->leftjoin('clusters', 'devices.cluster_id', '=', 'clusters.id')
                ->leftjoin('subinstances', 'clusters.subinstance_id', '=', 'subinstances.id')
                ->select('devices.*', 'clusters.name', 'subinstances.name_subinstance')
                ->where('devices.appID', $instance->appID);

            if ($request->has('category_device') && !empty($request->category_device)) {
                $device = $device->where('category', $request->category_device);
            }
            if ($request->has('subinstance_id') && !empty($request->subinstance_id)) {
                $device = $device->where('subinstance_id', $request->subinstance_id);
            }
            if ($request->has('cluster_id') && !empty($request->cluster_id)) {
                $device = $device->where('cluster_id', $request->cluster_id);
            }
            if ($request->has('location_device') && !empty($request->location_device)) {
                $device = $device->where('instances.city_id', $request->location_device);
            }

            if ($request->has('query_cluster_id') && !empty($request->query_cluster_id)) {
                $device = $device->where('cluster_id', $request->query_cluster_id);
            }

            if (!($request->category_device || $request->subinstance_id || $request->cluster_id || $request->location_device || $request->query_cluster_id)) {
                $device->when($request->category && $request->category_device, function ($q) use ($request) {
                    return $q->where('devices.category', $request->category);
                });
                $device->when($request->kabkot_id && $request->location_device, function ($q) use ($request) {
                    return $q->where('instances.city_id', $request->kabkot_id);
                });
                $device->when($request->subInstanceId && $request->subinstance_id, function ($q) use ($request) {
                    return $q->where('clusters.subinstance_id', $request->subInstanceId);
                });
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
        return view('partner.device.index', compact('subinstances', 'cluster', 'arrLocation'));
    }

    public function detail($id)
    {
        $device = Device::where('id', $id)->first();
        return view('partner.device.detail', compact('device'));
    }
}
