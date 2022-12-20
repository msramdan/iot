<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Subnet;
use App\Models\SubInstance;
use App\Models\Cluster;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        $subinstances = SubInstance::all();
        $instance = Auth::guard('instances')->user();

        if (request()->ajax()) {
            $device = Device::with(['subnet', 'cluster']);

            if ($request->has('category_device') && !empty($request->category_device)) {
                $device = $device->where('category', $request->category_device);
            }

            if ($request->has('subinstance') && !empty($request->subinstance)) {
                $device = $device->with(['cluster' => function($q) use($request){
                    $q->where('subinstance_id', $request->subinstance);
                }]);
            }

            $device = $device->orderBy('id', 'desc')->get();

            return DataTables::of($device)
                ->addIndexColumn()
                ->addColumn('subnet', function ($row) {
                    if (!$row->subnet) {
                        return '-';
                    }

                    return $row->subnet->subnet;
                })
                ->addColumn('cluster', function ($row) {
                    if (!$row->cluster) {
                        return '-';
                    }

                    return $row->cluster->name;
                })
                ->addColumn('instance', function ($row) {
                    if (!$row->instance) {
                        return '-';
                    }
                    return $row->instance->instance_name;
                })
                ->addColumn('action', 'admin.device._action')
                ->toJson();
        }

        return view('partner.device.index', compact('subinstances'));
    }
}
