<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Device;
use App\Models\Rawdata;
use App\Exports\ReportDeviceLogExport;
use Excel;
use Carbon\Carbon;

class ReportDeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:report_device_log')->only('index');
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $start_dates = Carbon::now()->firstOfMonth();
        $end_dates = Carbon::now()->endOfMonth();

        if (request()->ajax()) {
            $rawdatas = Rawdata::query();
            $dev_eui = intval($request->query('dev_eui'));
            $start_date = intval($request->query('start_date'));
            $end_date = intval($request->query('end_date'));

            if (isset($dev_eui) && !empty($dev_eui)) {
                if($dev_eui !='All'){
                    $rawdatas = $rawdatas->where('devEUI',$dev_eui);
                }
            }
            if (isset($start_date) && !empty($start_date)) {
                $from = date("Y-m-d H:i:s", substr($request->query('start_date'), 0, 10));
                $rawdatas = $rawdatas->where('created_at', '>=', $from);
            }else{
                $from = date('Y-m-d') . " 00:00:00";
                $rawdatas = $rawdatas->where('created_at', '>=', $from);
            }
            if (isset($end_date) && !empty($end_date)) {
                $to = date("Y-m-d H:i:s", substr($request->query('end_date'), 0, 10));
                $rawdatas = $rawdatas->where('created_at', '<=', $to);
            }else{
                $to = date('Y-m-d') . " 23:59:59";
                $rawdatas = $rawdatas->where('created_at', '<=', $to);
            }

            $rawdatas = $rawdatas->orderBy('rawdata.id', 'desc')->get();
            return DataTables::of($rawdatas)
                ->addIndexColumn()
                // ->addColumn('payload', function ($row) {
                //     $payload = json_decode($row->payload_data, true);
                //     return json_encode($payload, JSON_PRETTY_PRINT);
                // })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })
                ->addColumn('adr', function ($row) {
                    if ($row->adr == 1 || $row->adr == '1') {
                        return 'True';
                    }
                    return '-';
                })
                ->addColumn('action', 'admin.rawdata.include.action')
                ->rawColumns(['parsed', 'action'])
                ->toJson();
        }


        $microFrom = $start_dates->timestamp;
        $microTo = $end_dates->timestamp;

        return view('admin.report-devices.index',[
            'device' => Device::all(),
            'start_dates' => $start_dates,
            'end_dates' => $end_dates,
            'microFrom' => $microFrom,
            'microTo' => $microTo,
        ]);
    }

    public function export($dev_eui, $start_date, $end_date)
    {
        $date= date('d-m-Y');
        $nameFile = 'IOT-Device Log-' .$date;
         return Excel::download(new ReportDeviceLogExport($dev_eui, $start_date, $end_date), $nameFile.'.xlsx');

    }

}
