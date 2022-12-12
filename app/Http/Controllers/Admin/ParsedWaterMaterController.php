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
            return DataTables::of(ParsedWaterMater::query())
                ->addIndexColumn()
                ->addColumn('payload', function($row){
                    $payload = json_decode($row->payload_data, true);
                    return json_encode($payload, JSON_PRETTY_PRINT);
                })
                ->toJson();
        }

        return view('admin.parsed_rawdata.index');
    }

}
