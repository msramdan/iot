<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterLatestData;
use App\Models\MasterLatestDataPowerMeter;
use App\Models\Device;
use App\Models\MasterLatestDataGasMeter;
use App\Models\ParsedWaterMater;
use App\Models\ParsedPowerMater;
use App\Models\ParsedGasMater;
use App\Models\DailyUsageWaterMeter;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

use App\Models\SettingApp;

class MasterLastestDataController extends Controller
{
    public function waterMeterMaster(Request $request)
    {
        if (request()->ajax()) {
            $parsed_data = MasterLatestData::with(['device' => function ($k) {
                $k->where('devices.category', 'Water Meter');
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
                    if ($row->uplink_interval != null) {
                        return $row->uplink_interval . ' Seconds';
                    }
                    return '-';
                })
                ->addColumn('temperatur', function ($row) {
                    if ($row->temperatur != null) {
                        return $row->temperatur . 'C';
                    }
                    return '-';
                })
                ->addColumn('total_flow', function ($row) {
                    if ($row->total_flow != null) {
                        return $row->total_flow . 'L';
                    }
                    return '-';
                })
                ->addColumn('batrai_status', function ($row) {
                    if ($row->batrai_status != null) {
                        return $row->batrai_status . ' %';
                    }
                    return '-';
                })
                ->addColumn('status_valve', function ($row) {
                    if ($row->status_valve != null) {
                        return $row->status_valve;
                    }
                    return '-';
                })
                ->addColumn('detail', function ($row) {
                    return '<a href="' . url('panel/master-water-meter/detail/' . $row->device_id) . '" class="btn btn-sm  btn-success" target=""><i class="mdi mdi-eye"></i> Detail</a>';
                })
                ->rawColumns(['detail', 'action'])
                ->toJson();
        }

        return view('admin.device.latest-master-data.water-meter.index');
    }

    public function detailWaterMeter(Request $request, $id)
    {
        $date = $request->query('date');
        $parsed_data = ParsedWaterMater::where('device_id', $id);

        $device = Device::where('id', $id)->first();
        $devEUI = $device->devEUI;

        $lastData = MasterLatestData::where('device_id', $id)->first();

        $start_dates = Carbon::now()->firstOfMonth();
        $end_dates = Carbon::now()->endOfMonth();

        /**
         * Date for filter
         */
        if (!empty($date)) {
            $dates = explode(' to ', $request->date);
            $start = str_replace(',', '', $dates[0]) . " 00:00:00";
            $end = str_replace(',', '', $dates[1]) . " 23:59:59";

            $start_dates = date('Y-m-d H:i:s', strtotime($start));
            $end_dates = date('Y-m-d H:i:s', strtotime($end));

            $parsed_data = $parsed_data->whereBetween('created_at', [$start_dates, $end_dates]);
        }

        $device_id = $id;

        $parsed_data = $parsed_data
            ->orderBy('parsed_water_meter.id', 'desc')
            ->whereNull('status_valve')->get();

        $dailyUsages = DailyUsageWaterMeter::whereBetween('created_at', [$start_dates, $end_dates])->get();

        $parsed_dates = [];
        $daily_usage_dates = [];
        $baterai_datas = [];
        $temperature_datas = [];
        $total_flow_datas = [];
        $daily_usage_datas = [];

        foreach ($parsed_data as $data) {
            $dates = strtotime($data->created_at);
            $baterai = $data->batrai_status;
            $temperature = $data->temperatur;
            $total_flow = $data->total_flow;

            array_push($parsed_dates, $dates);
            array_push($baterai_datas, $baterai);
            array_push($temperature_datas, $temperature);
            array_push($total_flow_datas, $total_flow);
        }

        foreach ($dailyUsages as $daily) {
            array_push($daily_usage_dates, strtotime($daily->dates . " 00:00:00"));
            array_push($daily_usage_datas, $daily->usage);
        }


        return view('admin.device.latest-master-data.water-meter.detail', compact(
            'parsed_data',
            'device_id',
            'start_dates',
            'end_dates',
            'devEUI',
            'lastData',
            'parsed_dates',
            'baterai_datas',
            'temperature_datas',
            'total_flow_datas',
            'dailyUsages',
            'daily_usage_dates',
            'daily_usage_datas'
        ));
    }

    public function powerMeterMaster(Request $request)
    {
        if (request()->ajax()) {
            $parsed_data = MasterLatestDataPowerMeter::with(['device' => function ($k) {
                $k->where('devices.category', 'Power Meter');
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
                    if ($row->tegangan != null) {
                        return $row->tegangan . ' V';
                    }
                    return '-';
                })
                ->addColumn('arus', function ($row) {
                    if ($row->arus != null) {
                        return $row->arus . ' A';
                    }
                    return '-';
                })
                ->addColumn('frekuensi_pln', function ($row) {

                    if ($row->frekuensi_pln != null) {
                        return $row->frekuensi_pln . ' Hz';
                    }
                    return '-';
                })
                ->addColumn('active_power', function ($row) {

                    if ($row->active_power != null) {
                        return $row->active_power . ' kW';
                    }
                    return '-';
                })
                ->addColumn('power_factor', function ($row) {

                    if ($row->power_factor != null) {
                        return $row->power_factor;
                    }
                    return '-';
                })
                ->addColumn('total_energy', function ($row) {
                    if ($row->total_energy != null) {
                        return $row->total_energy . ' kWh';
                    }
                    return '-';
                })
                ->addColumn('status_switch', function ($row) {
                    if ($row->status_switch != null) {
                        return $row->status_switch;
                    }
                    return '-';
                })
                ->addColumn('detail', function ($row) {
                    return '<a href="' . url('panel/master-power-meter/detail/' . $row->device_id) . '" class="btn btn-sm  btn-success" target=""><i class="mdi mdi-eye"></i> Detail</a>';
                })
                ->rawColumns(['detail', 'action'])
                ->toJson();
        }

        return view('admin.device.latest-master-data.power-meter.index');
    }

    public function detailPowerMeter(Request $request, $id)
    {
        $date = $request->query('date');
        $parsed_data = ParsedPowerMater::where('device_id', $id);
        $device = Device::where('id', $id)->first();
        $lastData = MasterLatestDataPowerMeter::where('device_id', $id)->first();
        $devEUI = $device->devEUI;
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

        $parsed_data = $parsed_data->orderBy('id', 'desc')
            ->whereNull('status_switch')->get();

        $parsed_dates = [];
        $tegangan_datas = [];
        $arus_datas = [];
        $frekuensi_datas = [];
        $active_power_datas = [];
        $power_factor_datas = [];
        $total_energy_datas = [];

        foreach ($parsed_data as $data) {
            $dates = strtotime($data->created_at);

            array_push($parsed_dates, $dates);
            array_push($tegangan_datas, floatval($data->tegangan));
            array_push($arus_datas, floatval($data->arus));
            array_push($frekuensi_datas, floatval($data->frekuensi_pln));
            array_push($active_power_datas, floatval($data->active_power));
            array_push($power_factor_datas, floatval($data->power_factor));
            array_push($total_energy_datas, floatval($data->total_energy));
        }

        return view('admin.device.latest-master-data.power-meter.detail', compact(
            'parsed_data',
            'device_id',
            'start_dates',
            'end_dates',
            'devEUI',
            'lastData',
            'parsed_dates',
            'tegangan_datas',
            'arus_datas',
            'frekuensi_datas',
            'active_power_datas',
            'power_factor_datas',
            'total_energy_datas'
        ));
    }

    public function gasMeterMaster(Request $request)
    {
        if (request()->ajax()) {
            $parsed_data = MasterLatestDataGasMeter::with(['device' => function ($k) {
                $k->where('devices.category', 'Gas Meter');
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
                ->addColumn('gas_consumption', function ($row) {

                    if ($row->gas_consumption != null) {
                        return $row->gas_consumption . ' m3';
                    }
                    return '-';
                })

                ->addColumn('gas_total_purchase', function ($row) {

                    if ($row->gas_total_purchase != null) {
                        return $row->gas_total_purchase . ' m3';
                    }
                    return '-';
                })

                ->addColumn('purchase_remain', function ($row) {

                    if ($row->purchase_remain != null) {
                        return $row->purchase_remain . ' m3';
                    }
                    return '-';
                })

                ->addColumn('balance_of_battery', function ($row) {

                    if ($row->balance_of_battery != null) {
                        return $row->balance_of_battery . ' %';
                    }
                    return '-';
                })
                ->addColumn('valve_status', function ($row) {
                    if ($row->valve_status != null) {
                        return $row->valve_status;
                    }

                    return '-';
                })
                ->addColumn('meter_status_word', function ($row) {
                    $array =  json_decode($row->meter_status_word);
                    $hasil = '<ul>';
                    foreach ($array as $value) {
                        $hasil .= '<li>' . $value . '</li>';
                    };
                    $hasil .= '</ul>';
                    return $hasil;
                })

                ->addColumn('detail', function ($row) {
                    return '<a href="' . url('panel/master-gas-meter/detail/' . $row->device_id) . '" class="btn btn-sm  btn-success" target=""><i class="mdi mdi-eye"></i> Detail</a>';
                })
                ->rawColumns(['detail', 'meter_status_word', 'action'])
                ->toJson();
        }

        return view('admin.device.latest-master-data.gas-meter.index');
    }

    public function detailGasMeter(Request $request, $id)
    {
        $date = $request->query('date');
        $parsed_data = ParsedGasMater::where('device_id', $id);
        $device = Device::where('id', $id)->first();
        $devEUI = $device->devEUI;
        $lastData = MasterLatestDataGasMeter::where('device_id', $id)->first();

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

        $parsed_dates = [];
        $gas_consumtion_datas = [];
        $gas_total_purchase_datas = [];
        $purchase_remain_datas = [];
        $balance_of_bateray_datas = [];

        foreach ($parsed_data as $data) {
            $dates = strtotime($data->created_at);

            array_push($parsed_dates, $dates);
            array_push($gas_consumtion_datas, floatval($data->gas_consumption));
            array_push($gas_total_purchase_datas, floatval($data->gas_total_purchase));
            array_push($purchase_remain_datas, floatval($data->purchase_remain));
            array_push($balance_of_bateray_datas, floatval($data->balance_of_battery));
        }


        return view('admin.device.latest-master-data.gas-meter.detail', compact(
            'parsed_data',
            'device_id',
            'start_dates',
            'end_dates',
            'devEUI',
            'lastData',
            'parsed_dates',
            'gas_consumtion_datas',
            'gas_total_purchase_datas',
            'purchase_remain_datas',
            'balance_of_bateray_datas'
        ));
    }

    // commandlink water meter
    public function checkValve(Request $request)
    {
        Http::withHeaders(['x-access-token' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c='])
            ->withOptions(['verify' => false])
            ->post('https://wspiot.xyz/openapi/devicedl/create', [
                "devEUI" => $request->devEUI,
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
                "devEUI" => $request->devEUI,
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
                "devEUI" => $request->devEUI,
                "data" => 'IYE=',
                "confirmed" => true,
                "fport" => 8
            ]);
    }

    // commandlink power meter
    public function openSwitch(Request $request)
    {
        $device = Device::where('devEUI', $request->devEUI)->first();
        $pass = $device->password_device;
        $data = '1C10' . $pass . '000000001A00595923010199';
        $bin = hex2bin($data);       // convert the hex values to binary data stored as a PHP string
        $payload = base64_encode($bin);

        Http::withHeaders(['x-access-token' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c='])
            ->withOptions(['verify' => false])
            ->post('https://wspiot.xyz/openapi/devicedl/create', [
                "devEUI" => $request->devEUI,
                "data" => $payload,
                "confirmed" => true,
                "fport" => 8
            ]);
        // insert temp
        DB::table('temp_status_switch')->insert([
            'dev_eui' => $request->devEUI,
            'status' => 'OFF'
        ]);
    }

    public function closeSwitch(Request $request)
    {
        $device = Device::where('devEUI', $request->devEUI)->first();
        $pass = $device->password_device;
        $data = '1C10' . $pass . '000000001C00595923010199';
        $bin = hex2bin($data);       // convert the hex values to binary data stored as a PHP string
        $payload = base64_encode($bin);

        Http::withHeaders(['x-access-token' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c='])
            ->withOptions(['verify' => false])
            ->post('https://wspiot.xyz/openapi/devicedl/create', [
                "devEUI" => $request->devEUI,
                "data" => $payload,
                "confirmed" => true,
                "fport" => 8
            ]);
        // insert temp
        DB::table('temp_status_switch')->insert([
            'dev_eui' => $request->devEUI,
            'status' => 'ON'
        ]);
    }


    public function validationSwitch(Request $request)
    {
        Http::withHeaders(['x-access-token' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c='])
            ->withOptions(['verify' => false])
            ->post('https://wspiot.xyz/openapi/devicedl/create', [
                "devEUI" => $request->devEUI,
                "data" => 'EQT/BQAE',
                "confirmed" => true,
                "fport" => 8
            ]);
    }

    // commandlink gas
    public function openValveGas(Request $request)
    {
        $devEUI = str_split(substr($request->devEUI, 4), 2);
        $reversed = array_reverse($devEUI);
        $newDevEui = '';
        foreach ($reversed as $value) {
            $newDevEui .= $value;
        }
        $step1 = "68" . $newDevEui . "68040770F333333333C9";
        $split = str_split($step1, 2);
        $jml = 0;
        foreach ($split as $row) {
            $con = hexdec($row);
            $jml = $jml + $con;
        }
        $mod = $jml % 256;
        $code = dechex($mod);
        $hexData = $step1 . '' . $code . "16";          // and much more hex values as string as in your example
        $bin = hex2bin($hexData);       // convert the hex values to binary data stored as a PHP string
        $payload = base64_encode($bin);
        Http::withHeaders(['x-access-token' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c='])
            ->withOptions(['verify' => false])
            ->post('https://wspiot.xyz/openapi/devicedl/create', [
                "devEUI" => $request->devEUI,
                "data" => $payload,
                "confirmed" => true,
                "fport" => 8
            ]);
    }

    public function closeValveGas(Request $request)
    {

        $devEUI = str_split(substr($request->devEUI, 4), 2);
        $reversed = array_reverse($devEUI);
        $newDevEui = '';
        foreach ($reversed as $value) {
            $newDevEui .= $value;
        }
        $step1 = "68" . $newDevEui . "6804076FF33333333368";
        $split = str_split($step1, 2);
        $jml = 0;
        foreach ($split as $row) {
            $con = hexdec($row);
            $jml = $jml + $con;
        }
        $mod = $jml % 256;
        $code = dechex($mod);
        $hexData = $step1 . '' . $code . "16";
        $bin = hex2bin($hexData);       // convert the hex values to binary data stored as a PHP string
        $payload = base64_encode($bin);
        Http::withHeaders(['x-access-token' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c='])
            ->withOptions(['verify' => false])
            ->post('https://wspiot.xyz/openapi/devicedl/create', [
                "devEUI" => $request->devEUI,
                "data" => $payload,
                "confirmed" => true,
                "fport" => 8
            ]);
    }

    public function topup(Request $request)
    {
        $devEUI = str_split(substr($request->devEUI, 4), 2);
        $reversed = array_reverse($devEUI);
        $newDevEui = '';
        foreach ($reversed as $value) {
            $newDevEui .= $value;
        }
        // cari reverse tanggal
        $date = date("ymdHi");
        $splitDate =  str_split($date, 2);
        $fixDate  =  konversiTime($splitDate);
        // cari reverse total m3
        $isiGas = str_pad($request->total * 100, 8, "0", STR_PAD_LEFT);
        $split = str_split($isiGas, 1);
        $hasil = konversiM3($split);
        $revm3 = str_split($hasil, 2);
        $reversedm3 = array_reverse($revm3);
        $newTotalm3 = '';
        foreach ($reversedm3 as $value) {
            $newTotalm3 .= $value;
        }
        $getPurchaseCode = $fixDate . '' . $newTotalm3;

        // $getPurchaseCode = '76474c435533343333';
        $arrPayload = array();
        $splitPur = str_split($getPurchaseCode, 2);
        foreach ($splitPur as $rows) {
            $splitPartial =   str_split($rows, 1);
            $string = '';
            foreach ($splitPartial as $datas) {
                if ($datas < 10) {
                    $jml = $datas;
                } else {
                    $jml =  cekAngka($datas);
                }

                $cek = $jml - 3;
                if ($cek < 10) {
                    $string .= $cek;
                } else {
                    $b = cekAbjHex($cek);
                    $string .= $b;
                }
            }
            $stringInt = (int) $string;
            // hecal to decimal
            $fix = hexdec($string);
            array_push($arrPayload, $fix);
        }


        $setting_app = SettingApp::all()->first();
        $url = $setting_app->endpoint_purchase_code;
        $response = Http::post($url, [
            'BarisCode' => $arrPayload
        ]);
        $responsePC = json_decode($response->getBody());
        $arr = $responsePC->arr;
        $lastString = substr($arr, -4);
        $payload = "68" . $newDevEui . "68040D432E" . $fixDate . '' . $newTotalm3 . '' . $lastString;
        $split = str_split($payload, 2);
        $jml = 0;
        foreach ($split as $row) {
            $con = hexdec($row);
            $jml = $jml + $con;
        }
        $mod = $jml % 256;
        $code = dechex($mod);
        $hexData = $payload . '' . $code . "16";
        $bin = hex2bin($hexData);
        $payloadData = base64_encode($bin);
        Http::withHeaders(['x-access-token' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c='])
            ->withOptions(['verify' => false])
            ->post('https://wspiot.xyz/openapi/devicedl/create', [
                "devEUI" => $request->devEUI,
                "data" => $payloadData,
                "confirmed" => true,
                "fport" => 8
            ]);
        Alert::info('Please Waiting Response From Server', 'In progress to Topup Gas');
        return redirect()->back();
    }
}
