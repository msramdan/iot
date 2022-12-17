<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterLatestData;
use App\Models\MasterLatestDataPowerMeter;
use App\Models\Device;
use App\Models\ParsedWaterMater;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class MasterLastestDataController extends Controller
{
    public function waterMeterMaster(Request $request)
    {
         if (request()->ajax()) {
           $parsed_data = MasterLatestData::with(['device' => function($k) {
                    $k->where('devices.category', 'Water Meter');
                }]);

            $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

            return DataTables::of($parsed_data)
                ->addIndexColumn()
                ->addColumn('device', function($row) {
                    if ($row->device) {
                        return $row->device->devName;
                    }

                    return '-';
                })
                ->addColumn('devEUI', function($row) {
                    if ($row->device) {
                        return $row->device->devEUI;
                    }

                    return '-';
                })
                ->addColumn('frame_id', function($row) {
                    return $row->frame_id ?? '-' ;
                })
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
                ->addColumn('status_valve', function ($row) {
                    if ($row->status_valve) {
                        return $row->status_valve;
                    }
                    return '-';
                })
                ->addColumn('detail', function ($row) {
                        return '<a href="'.url('panel/master-water-meter/detail/'.$row->device_id).'" class="btn btn-sm  btn-success" target=""><i class="mdi mdi-eye"></i> Detail</a>';
                })
                ->rawColumns(['detail', 'action'])
                ->toJson();
        }

        return view('admin.device.latest-master-data.water-meter.index');
    }

    public function detailWaterMeter(Request $request, $id){
        $date = $request->query('date');
        $parsed_data = ParsedWaterMater::where('device_id', $id);

        $start_dates = Carbon::now()->firstOfMonth();
        $end_dates = Carbon::now()->endOfMonth();

        if (!empty($date)) {
            $dates = explode(' to ', $request->date);
            $start = str_replace(',', '', $dates[0])." 00:00:00";
            $end = str_replace(',', '', $dates[1])." 23:59:59";

            $start_dates = date('Y-m-d H:i:s', strtotime($start));
            $end_dates = date('Y-m-d H:i:s', strtotime($end));

            $parsed_data = $parsed_data->whereBetween('created_at', [$start_dates, $end_dates]);
        }

        $device_id = $id;

        $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

        return view('admin.device.latest-master-data.water-meter.detail', compact('parsed_data', 'device_id', 'start_dates', 'end_dates'));
    }

    public function powerMeterMaster(Request $request)
    {
         if (request()->ajax()) {
           $parsed_data = MasterLatestDataPowerMeter::with(['device' => function($k) {
                    $k->where('devices.category', 'Power Meter');
                }]);

            $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

            return DataTables::of($parsed_data)
                ->addIndexColumn()
                ->addColumn('device', function($row) {
                    if ($row->device) {
                        return $row->device->devName;
                    }

                    return '-';
                })
                ->addColumn('devEUI', function($row) {
                    if ($row->device) {
                        return $row->device->devEUI;
                    }

                    return '-';
                })
                ->addColumn('frame_id', function($row) {
                    return $row->frame_id ?? '-' ;
                })
                ->addColumn('tegangan', function ($row) {
                    if ($row->tegangan) {
                        return $row->tegangan;
                    }
                    return '-';
                })
                ->addColumn('arus', function ($row) {
                    if ($row->arus) {
                        return $row->arus;
                    }
                    return '-';
                })
                ->addColumn('frekuensi_pln', function ($row) {
                    if ($row->frekuensi_pln) {
                        return $row->frekuensi_pln;
                    }
                    return '-';
                })
                ->addColumn('active_power', function ($row) {
                    if ($row->active_power) {
                        return $row->active_power;
                    }
                    return '-';
                })
                ->addColumn('power_factor', function ($row) {
                    if ($row->power_factor) {
                        return $row->power_factor;
                    }
                    return '-';
                })
                ->addColumn('total_energy', function ($row) {
                    if ($row->total_energy) {
                        return $row->total_energy;
                    }
                    return '-';
                })
                ->addColumn('rawdata_id', function ($row) {
                        return '<a href="'.url('panel/rawdata?rawdata='.$row->rawdata_id).'" class="btn btn-sm  btn-success" target="_blank"><i class="mdi mdi-eye"></i> History </a>';
                })
                ->rawColumns(['rawdata_id', 'action'])
                ->toJson();
        }

        return view('admin.device.latest-master-data.power-meter.index');
    }

    public function gasMeterMaster(Request $request)
    {
         if (request()->ajax()) {
           $parsed_data = MasterLatestData::with(['device' => function($k) {
                    $k->where('devices.category', 'Gas Meter');
                }]);

            $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

            return DataTables::of($parsed_data)
                ->addIndexColumn()
                ->addColumn('device', function($row) {
                    if ($row->device) {
                        return $row->device->devName;
                    }

                    return '-';
                })
                ->addColumn('devEUI', function($row) {
                    if ($row->device) {
                        return $row->device->devEUI;
                    }

                    return '-';
                })
                ->addColumn('frame_id', function($row) {
                    return $row->frame_id ?? '-' ;
                })
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
                        return '<a href="'.url('panel/rawdata?rawdata='.$row->rawdata_id).'" class="btn btn-sm  btn-success" target="_blank"><i class="mdi mdi-eye"></i> History </a>';
                })
                ->rawColumns(['rawdata_id', 'action'])
                ->toJson();
        }

        return view('admin.device.latest-master-data.gas-meter.index');
    }
}
