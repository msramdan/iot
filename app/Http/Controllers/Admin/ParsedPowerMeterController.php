<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\ParsedPowerMater;
use Yajra\DataTables\DataTables;

class ParsedPowerMeterController extends Controller
{
    public function index(Request $request)
    {
        $devices = Device::all();

        if(request()->ajax()){
            $parsed_data = ParsedPowerMater::with('rawdata')->with(['device' => function($q){
                $q->where('devices.category', 'Power Meter');
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
                ->addColumn('tegangan', function ($row) {
                    return $row->tegangan.' V';
                })
                ->addColumn('arus', function ($row) {
                    return $row->arus.' A';
                })
                ->addColumn('frekuensi_pln', function ($row) {
                    return $row->frekuensi_pln. ' Hz';
                })
                ->addColumn('active_power', function ($row) {
                    return $row->active_power.' kW';
                })
                ->addColumn('power_factor', function ($row) {
                    return $row->power_factor;
                })
                ->addColumn('total_energy', function ($row) {
                    return $row->total_energy .' kWh';
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
        return view('admin.parsed_rawdata.parsed_power_meter.index', compact('devices'));
    }
}
