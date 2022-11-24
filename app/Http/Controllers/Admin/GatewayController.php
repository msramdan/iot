<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rawdata;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GatewayController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:gateway_show')->only('index');
    }

    public function index()
    {
        if (request()->ajax()) {
            $query = Rawdata::groupBy('gwid')->orderBy('id', 'desc')->get();
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('gateway', function($row){
                    return $row->gwid;
                })
                ->toJson();
        }
        return view('admin.gateway.index');
    }
}
