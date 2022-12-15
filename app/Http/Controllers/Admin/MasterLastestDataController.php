<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterLatestData;
use App\Models\Device;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

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
                ->addColumn('rawdata_id', function ($row) {
                        return '<a href="'.url('panel/rawdata?rawdata='.$row->rawdata_id).'" class="btn btn-sm  btn-success" target="_blank"><i class="mdi mdi-eye"></i> History </a>';
                })
                ->rawColumns(['rawdata_id', 'action'])
                ->toJson();
        }

        return view('admin.device.latest-master-data.water-meter.index');
    }

    public function powerMeterMaster(Request $request)
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
