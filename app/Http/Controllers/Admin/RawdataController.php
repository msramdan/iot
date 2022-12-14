<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rawdata;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RawdataController extends Controller
{
    public function index (Request $request)
    {
        if (request()->ajax()) {
            $rawdata = Rawdata::with(['device', 'parsed_water_meter']);
            $query_data = $request->query('rawdata');

            if (isset($query_data) && !empty($query_data)) {
                $rawdata = $rawdata->where('id', $query_data);
            }

            $rawdata = $rawdata->orderBy('id', 'DESC')->get();

            return DataTables::of($rawdata)
                ->addIndexColumn()
                ->addColumn('payload', function($row){
                    $payload = json_decode($row->payload_data, true);
                    return json_encode($payload, JSON_PRETTY_PRINT);
                })
                ->addColumn('parsed', function ($row) {
                    if ($row->device->category == 'Water Meter') {
                        return '<a href="'.url('/panel/parsed-wm?parsed_data='.$row->id).'" target="_blank" class="btn btn-sm  btn-success"><i class="mdi mdi-eye"></i> Parsed Rawdata </a>';
                    } else {
                        return  '<a disabled href="" class="btn btn-sm  btn-success"><i class="mdi mdi-eye"></i> Parsed Rawdata </a>';
                    }

                })
                ->rawColumns(['parsed', 'action'])
                ->toJson();
        }

        return view('admin.rawdata.index');
    }
}
