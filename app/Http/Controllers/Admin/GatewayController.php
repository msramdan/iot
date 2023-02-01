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
                ->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })
                ->addColumn('status_online', function ($row) {
                    if ($row->status_online == 1) {
                        return '<span class="badge badge-label bg-success"><i class="mdi mdi-circle-medium"></i>Aktive</span>';
                    } else {
                        return '<span class="badge badge-label bg-danger"><i class="mdi mdi-circle-medium"></i>Non Aktive</span>';
                    }
                })
                ->addColumn('pktfwdStatus', function ($row) {
                    if ($row->pktfwdStatus == 1) {
                        return '<span class="badge badge-label bg-success"><i class="mdi mdi-circle-medium"></i>Aktive</span>';
                    } else {
                        return '<span class="badge badge-label bg-danger"><i class="mdi mdi-circle-medium"></i>Non Aktive</span>';
                    }
                })
                ->rawColumns(['status_online', 'pktfwdStatus'])
                ->toJson();
        }
        return view('admin.gateway.index');
    }
}
