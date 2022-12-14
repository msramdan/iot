<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParsedWaterMater;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ParsedWaterMaterController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax()){
            $parsed_data = ParsedWaterMater::with(['rawdata' => function($q) {
                $q->with(['device' => function($k) {
                    $k->where('devices.category', 'Water Meter');
                }]);
            }]);

            $query_parsed = intval($request->query('parsed_data'));

            if (isset($query_parsed) && !empty($query_parsed)) {
                $parsed_data = $parsed_data->where('rawdata_id', $query_parsed);
            }

            $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

            return DataTables::of($parsed_data)
                ->addIndexColumn()
                ->addColumn('uplink_interval', function ($row) {
                    if ($row->uplink_interval) {
                        return $row->uplink_interval.' Seconds';
                    }
                    return '-';
                })
                ->addColumn('temperatur', function ($row) {
                    if ($row->temperatur) {
                        return $row->temperatur.'C';
                    }
                    return '-';
                })
                ->addColumn('total_flow', function ($row) {
                    if ($row->total_flow) {
                        return $row->total_flow.'L';
                    }
                    return '-';
                })
                ->addColumn('batrai_status', function ($row) {
                    if ($row->batrai_status) {
                        return $row->batrai_status.' %';
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
        return view('admin.parsed_rawdata.index');
    }

}
