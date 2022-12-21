<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterLatestData;
use App\Models\MasterLatestDataPowerMeter;
use App\Models\Device;
use App\Models\ParsedWaterMater;
use App\Models\ParsedPowerMater;
use App\Models\ParsedGasMater;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class MasterLatestDataController extends Controller
{
    public function waterMeterMaster(Request $request)
    {
        $instance = Auth::guard('instances')->user();
        if (request()->ajax()) {
            $parsed_data = MasterLatestData::with(['device' => function ($k) use($instance){
                $k->with(['cluster' => function($q) use($instance){
                    $q->where('instance_id', $instance->id);
                }])
                ->where('devices.category', 'Water Meter');
            }]);

            $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

            return DataTables::of($parsed_data)
                ->addIndexColumn()
                ->addColumn('device', function ($row) {
                    if ($row->device) {
                        return $row->device->devName;
                    }

                    return '-';
                })
                ->addColumn('devEUI', function ($row) {
                    if ($row->device) {
                        return $row->device->devEUI;
                    }

                    return '-';
                })
                ->addColumn('frame_id', function ($row) {
                    return $row->frame_id ?? '-';
                })
                ->addColumn('uplink_interval', function ($row) {
                    if ($row->uplink_interval) {
                        return $row->uplink_interval . ' Seconds';
                    }
                    return '-';
                })
                ->addColumn('temperatur', function ($row) {
                    if ($row->temperatur) {
                        return $row->temperatur . 'C';
                    }
                    return '-';
                })
                ->addColumn('total_flow', function ($row) {
                    if ($row->total_flow) {
                        return $row->total_flow . 'L';
                    }
                    return '-';
                })
                ->addColumn('batrai_status', function ($row) {
                    if ($row->batrai_status) {
                        return $row->batrai_status . ' %';
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
                    return '<a href="' . url('master-water-meter/detail/' . $row->device_id) . '" class="btn btn-sm  btn-success" target=""><i class="mdi mdi-eye"></i> Detail</a>';
                })
                ->rawColumns(['detail', 'action'])
                ->toJson();
        }

        return view('partner.device.latest-master-data.water-meter.index');
    }

    public function detailWaterMeter(Request $request, $id)
    {
        $date = $request->query('date');
        $instance = Auth::guard('instances')->user();

        $parsed_data = ParsedWaterMater::wherehas('device', function($q) use($instance) {
            $q->wherehas('cluster', function($s) use($instance) {
                $s->where('instance_id', $instance->id);
            });
        })->where('device_id', $id);

        $device = Device::where('id', $id)->first();
        $devEUI = $device->devEUI;

        $lastData = MasterLatestData::where('device_id', $id)->first();

        $start_dates = Carbon::now()->firstOfMonth();
        $end_dates = Carbon::now()->endOfMonth();

        if (!empty($date)) {
            $dates = explode(' to ', $request->date);
            $start = str_replace(',', '', $dates[0]) . " 00:00:00";
            $end = str_replace(',', '', $dates[1]) . " 23:59:59";

            $start_dates = date('Y-m-d H:i:s', strtotime($start));
            $end_dates = date('Y-m-d H:i:s', strtotime($end));

            $parsed_data = $parsed_data->whereBetween('created_at', [$start_dates, $end_dates]);
        }

        $device_id = $id;

        $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

        return view('partner.device.latest-master-data.water-meter.detail', compact('parsed_data', 'device_id', 'start_dates', 'end_dates', 'devEUI', 'lastData'));
    }

    public function powerMeterMaster(Request $request)
    {
        $instance = Auth::guard('instances')->user();

        if (request()->ajax()) {
            $parsed_data = MasterLatestDataPowerMeter::with(['device' => function($k) use($instance){
                $k->with(['cluster' => function($s) use($instance) {
                    $s->where('instance_id', $instance->id);
                }])
                ->where('devices.category', 'Power Meter');
            }]);

            $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

            return DataTables::of($parsed_data)
                ->addIndexColumn()
                ->addColumn('device', function ($row) {
                    if ($row->device) {
                        return $row->device->devName;
                    }

                    return '-';
                })
                ->addColumn('devEUI', function ($row) {
                    if ($row->device) {
                        return $row->device->devEUI;
                    }

                    return '-';
                })
                ->addColumn('frame_id', function ($row) {
                    return $row->frame_id ?? '-';
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
                ->addColumn('detail', function ($row) {
                    return '<a href="' . url('master-power-meter/detail/' . $row->device_id) . '" class="btn btn-sm  btn-success" target=""><i class="mdi mdi-eye"></i> Detail</a>';
                })
                ->rawColumns(['detail', 'action'])
                ->toJson();
        }

        return view('partner.device.latest-master-data.power-meter.index');
    }

    public function detailPowerMeter(Request $request, $id)
    {
        $instance = Auth::guard('instances')->user();
        $date = $request->query('date');
        $parsed_data = ParsedPowerMater::with(['device' => function($q) use($instance) {
            $q->with(['cluster' => function($s) use($instance) {
                $s->where('instance_id', $instance->id);
            }]);
        }])->where('device_id', $id);

        $start_dates = Carbon::now()->firstOfMonth();
        $end_dates = Carbon::now()->endOfMonth();

        if (!empty($date)) {
            $dates = explode(' to ', $request->date);
            $start = str_replace(',', '', $dates[0]) . " 00:00:00";
            $end = str_replace(',', '', $dates[1]) . " 23:59:59";

            $start_dates = date('Y-m-d H:i:s', strtotime($start));
            $end_dates = date('Y-m-d H:i:s', strtotime($end));

            $parsed_data = $parsed_data->whereBetween('created_at', [$start_dates, $end_dates]);
        }

        $device_id = $id;

        $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

        return view('partner.device.latest-master-data.power-meter.detail', compact('parsed_data', 'device_id', 'start_dates', 'end_dates'));
    }

    public function gasMeterMaster(Request $request)
    {
        $instance = Auth::guard('instances')->user();
        if (request()->ajax()) {
            $parsed_data = MasterLatestData::with(['device' => function ($k) use($instance){
                $k->with(['cluster' => function($s) use($instance) {
                    $s->where('instance_id', $instance->id);
                }])
                ->where('devices.category', 'Gas Meter');
            }]);

            $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

            return DataTables::of($parsed_data)
                ->addIndexColumn()
                ->addColumn('device', function ($row) {
                    if ($row->device) {
                        return $row->device->devName;
                    }

                    return '-';
                })
                ->addColumn('devEUI', function ($row) {
                    if ($row->device) {
                        return $row->device->devEUI;
                    }

                    return '-';
                })
                ->addColumn('gas_consumtion', function($row) {
                    if ($row->gas_consumtion) {
                        return $row->gas_consumtion;
                    }

                    return '-';
                })
                ->addColumn('gas_total_purchase', function($row) {
                    if ($row->gas_total_purchase) {
                        return $row->gas_total_purchase;
                    }

                    return '-';
                })
                ->addColumn('purchase_remain', function($row) {
                    if ($row->purchase_remain) {
                        return $row->purchase_remain;
                    }

                    return '-';
                })
                ->addColumn('balance_of_battery', function($row) {
                    if ($row->balance_of_battery) {
                        return $row->balance_of_battery;
                    }

                    return '-';
                })
                ->addColumn('meter_status_word', function($row) {
                    if ($row->meter_status_word) {
                        return $row->meter_status_word;
                    }

                    return '-';
                })
                ->addColumn('valve_status', function($row) {
                    if ($row->valve_status) {
                        return $row->valve_status;
                    }

                    return '-';
                })
                ->addColumn('frame_id', function ($row) {
                    return $row->frame_id ?? '-';
                })
               ->addColumn('detail', function ($row) {
                    return '<a href="' . url('master-gas-meter/detail/' . $row->device_id) . '" class="btn btn-sm  btn-success" target=""><i class="mdi mdi-eye"></i> Detail</a>';
                })
                ->rawColumns(['detail', 'action'])
                ->toJson();
        }

        return view('partner.device.latest-master-data.gas-meter.index');
    }

    public function detailGasMeter(Request $request, $id)
    {
        $date = $request->query('date');
        $instance = Auth::guard('instances')->user();

        $parsed_data = ParsedGasMater::with(['device' => function($q) use($instance) {
            $q->with(['cluster' => function($s) use($instance) {
                $s->where('instance_id', $instance->id);
            }]);
        }])->where('device_id', $id);

        $start_dates = Carbon::now()->firstOfMonth();
        $end_dates = Carbon::now()->endOfMonth();

        if (!empty($date)) {
            $dates = explode(' to ', $request->date);
            $start = str_replace(',', '', $dates[0]) . " 00:00:00";
            $end = str_replace(',', '', $dates[1]) . " 23:59:59";

            $start_dates = date('Y-m-d H:i:s', strtotime($start));
            $end_dates = date('Y-m-d H:i:s', strtotime($end));

            $parsed_data = $parsed_data->whereBetween('created_at', [$start_dates, $end_dates]);
        }

        $device_id = $id;

        $parsed_data = $parsed_data->orderBy('id', 'desc')->get();

        return view('partner.device.latest-master-data.gas-meter.detail', compact('parsed_data', 'device_id', 'start_dates', 'end_dates'));
    }

    public function checkValve(Request $request)
    {
        Http::withHeaders(['x-access-token' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c='])
            ->withOptions(['verify' => false])
            ->post('https://wspiot.xyz/openapi/devicedl/create', [
                "devEUI" =>$request->devEUI,
                "data" => 'IQ==',
                "confirmed" => true,
                "fport" => 8
            ]);
    }

    public function openValve(Request $request)
    {
        Http::withHeaders(['x-access-token' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c='])
            ->withOptions(['verify' => false])
            ->post('https://wspiot.xyz/openapi/devicedl/create', [
                "devEUI" =>$request->devEUI,
                "data" => 'IQE=',
                "confirmed" => true,
                "fport" => 8
            ]);
    }

    public function closeValve(Request $request)
    {
        Http::withHeaders(['x-access-token' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c='])
            ->withOptions(['verify' => false])
            ->post('https://wspiot.xyz/openapi/devicedl/create', [
                "devEUI" =>$request->devEUI,
                "data" => 'IYE=',
                "confirmed" => true,
                "fport" => 8
            ]);
    }
}
