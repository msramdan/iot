<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\ParsedGasMater;
use Yajra\DataTables\DataTables;
class ParsedGasMeterController extends Controller
{
     public function index(Request $request)
    {
        $devices = Device::all();

        if(request()->ajax()){
            $parsed_data = ParsedGasMater::with('rawdata')->with(['device' => function($q){
                $q->where('devices.category', 'Gas Meter');
            }]);

            $query_parsed = intval($request->query('parsed_data'));
            $device_id = intval($request->query('device_id'));

            if (isset($query_parsed) && !empty($query_parsed)) {
                $parsed_data = $parsed_data->where('rawdata_id', $query_parsed);
            }

            if (isset($device_id) && !empty($device_id)) {
                $parsed_data = $parsed_data->where('device_id', $device_id);
            }

            if ($request->has('device') && !empty($request->device)) {
                $parsed_data = $parsed_data->where('device_id', $request->device);
            }

            $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

            return DataTables::of($parsed_data)
                ->addIndexColumn()
                ->addColumn('device_name', function($row) {
                    if ($row->device) {
                        return $row->device->devName;
                    }

                    return '-';
                })
                ->addColumn('rawdata_id', function ($row) {
                        return '<a href="'.url('panel/rawdata?rawdata='.$row->rawdata_id).'" class="btn btn-sm  btn-success" target="_blank"><i class="mdi mdi-eye"></i> Rawdata </a>';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })
                ->addColumn('payload', function ($row) {
                    $payload = json_decode($row->payload_data, true);
                    return json_encode($payload, JSON_PRETTY_PRINT);
                })

                ->rawColumns(['rawdata_id', 'action'])
                ->toJson();
        }
        return view('admin.parsed_rawdata.parsed_gas_meter.index', compact('devices'));
    }
}
