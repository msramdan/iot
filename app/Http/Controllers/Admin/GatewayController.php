<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gateway;
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
            $query = Gateway::all();
            return Datatables::of($query)
                ->addIndexColumn()
                ->toJson();
        }
        return view('admin.gateway.index');
    }
}
