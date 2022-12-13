<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParsedWaterMater;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ParsedWaterMaterController extends Controller
{
    public function index()
    {
        if(request()->ajax()){
            return DataTables::of(ParsedWaterMater::orderBy('id', 'DESC')->get())
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
                        return '<a href="" class="btn btn-sm  btn-success"><i class="mdi mdi-eye"></i> Rawdata </a>';
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
