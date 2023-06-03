<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rawdata;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class RawdataController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $rawdata = DB::table('rawdata')
                ->join('devices', 'rawdata.devEUI', '=', 'devices.devEUI')->limit(5000)
                ->select('rawdata.*', 'devices.category');
            $query_data = $request->query('rawdata');

            if (isset($query_data) && !empty($query_data)) {
                $rawdata = $rawdata->where('rawdata.id', $query_data);
            }

            $rawdata = $rawdata->orderBy('id', 'DESC')->get();

            return DataTables::of($rawdata)
                ->addIndexColumn()
                ->addColumn('payload', function ($row) {
                    $payload = json_decode($row->payload_data, true);
                    return json_encode($payload, JSON_PRETTY_PRINT);
                })
                ->addColumn('parsed', function ($row) {
                    if ($row->type_payload == 'Alert') {
                        return '<button style="width:120px" class="btn btn-sm btn-danger"> Alert Rawdata</button>';
                    } else if ($row->type_payload == 'Topup Gas Success') {
                        return '<button style="width:120px" class="btn btn-sm btn-primary"> Topup Success</button>';
                    } else if ($row->type_payload == 'Topup Gas Error') {
                        return '<button style="width:120px" class="btn btn-sm btn-danger"> Topup Error</button>';
                    } else {
                        if ($row->category == 'Water Meter') {
                            return '<a href="' . url('/panel/parsed-wm?parsed_data=' . $row->id) . '" style="width:120px" target="_blank" class="btn btn-sm  btn-success"> Parsed Rawdata </a>';
                        } else if ($row->category == 'Power Meter') {
                            return  '<a href="' . url('/panel/parsed-pm?parsed_data=' . $row->id) . '" style="width:120px" target="_blank" class="btn btn-sm  btn-success"> Parsed Rawdata </a>';
                        } else {
                            return  '<a href="' . url('/panel/parsed-gm?parsed_data=' . $row->id) . '" style="width:120px" target="_blank" class="btn btn-sm  btn-success"> Parsed Rawdata </a>';
                        }
                    }
                })
                ->rawColumns(['parsed', 'action'])
                ->toJson();
        }

        return view('admin.rawdata.index');
    }
}
