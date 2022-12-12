<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rawdata;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RawdataController extends Controller
{
    public function index ()
    {
        if(request()->ajax()){
            return DataTables::of(Rawdata::orderBy('id', 'DESC')->get())
                ->addIndexColumn()
                ->addColumn('payload', function($row){
                    $payload = json_decode($row->payload_data, true);
                    return json_encode($payload, JSON_PRETTY_PRINT);
                })
                ->toJson();
        }

        return view('admin.rawdata.index');
    }
}
