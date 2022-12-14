<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\ParsedGasMater;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class ParsedGasMeterController extends Controller
{
    public function index(Request $request)
    {
        $devices = Device::all();
        $instance = Auth::guard('instances')->user();

        if(request()->ajax()){
            $parsed_data = ParsedGasMater::with('rawdata')->with(['device' => function($q) use($instance) {
                $q->with(['instance' => function($k) use($instance) {
                    $k->where('id', $instance->id);
                }])
                ->where('devices.category', 'Gas Meter');
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
                ->addColumn('gas_consumtion', function($row) {
                    if ($row->gas_consumtion) {
                        return $row->gas_consumtion;
                    }

                    return '-';
                })
                ->addColumn('gas_total_purchase', function($row) {
                    if ($row->gas_total_purchase) {
                        return $row->gas_total_purchase;
                    }

                    return '-';
                })
                ->addColumn('purchase_remain', function($row) {
                    if ($row->purchase_remain) {
                        return $row->purchase_remain;
                    }

                    return '-';
                })
                ->addColumn('balance_of_battery', function($row) {
                    if ($row->balance_of_battery) {
                        return $row->balance_of_battery;
                    }

                    return '-';
                })
                ->addColumn('meter_status_word', function($row) {
                    if ($row->meter_status_word) {
                        return $row->meter_status_word;
                    }

                    return '-';
                })
                ->addColumn('valve_status', function($row) {
                    if ($row->valve_status) {
                        return $row->valve_status;
                    }

                    return '-';
                })
                ->addColumn('rawdata_id', function ($row) {
                        return '<a href="'.url('panel/rawdata?rawdata='.$row->rawdata_id).'" class="btn btn-sm  btn-success" target="_blank"><i class="mdi mdi-eye"></i> Rawdata </a>';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })
                ->rawColumns(['rawdata_id', 'action'])
                ->toJson();
        }
        return view('partner.parsed_rawdata.parsed_gas_meter.index', compact('devices'));
    }
}
