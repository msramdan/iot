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

        if (request()->ajax()) {
            $parsed_data = ParsedGasMater::with('rawdata')->with(['device' => function ($q) {
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
                ->addColumn('device_name', function ($row) {
                    if ($row->device) {
                        return $row->device->devName;
                    }

                    return '-';
                })

                ->addColumn('gas_consumption', function ($row) {
                    if ($row->gas_consumption != null) {
                        return $row->gas_consumption . ' m3';
                    }
                    return '-';
                })

                ->addColumn('gas_total_purchase', function ($row) {
                    if ($row->gas_total_purchase != null) {
                        return $row->gas_total_purchase . ' m3';
                    }
                    return '-';
                })

                ->addColumn('purchase_remain', function ($row) {
                    if ($row->purchase_remain != null) {
                        return $row->purchase_remain . ' m3';
                    }
                    return '-';
                })

                ->addColumn('balance_of_battery', function ($row) {
                    if ($row->balance_of_battery != null) {
                        return $row->balance_of_battery . ' %';
                    }
                    return '-';
                })

                ->addColumn('rawdata_id', function ($row) {
                    return '<a href="' . url('panel/rawdata?rawdata=' . $row->rawdata_id) . '" class="btn btn-sm  btn-success" target="_blank"><i class="mdi mdi-eye"></i> Rawdata </a>';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })
                ->addColumn('meter_status_word', function ($row) {
                    if ($row->meter_status_word != null) {
                        $array =  json_decode($row->meter_status_word);
                        $hasil = '<ul>';
                        foreach ($array as $value) {
                            $hasil .= '<li>' . $value . '</li>';
                        };
                        $hasil .= '</ul>';
                        return $hasil;
                    }
                    return '-';
                })
                ->rawColumns(['rawdata_id', 'meter_status_word', 'action'])
                ->toJson();
        }
        return view('admin.parsed_rawdata.parsed_gas_meter.index', compact('devices'));
    }
}
