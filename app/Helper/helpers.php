<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Rawdata;
use App\Models\Ticket;
use App\Models\DailyUsageDevice;
use App\Models\ParsedWaterMater;
use App\Models\ParsedPowerMater;
use App\Models\ParsedGasMater;

if (!function_exists('set_active')) {
    function set_active($uri)
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return 'active';
                }
            }
        } else {
            if (Route::is($uri)) {
                return 'active';
            }
        }
    }
}

function setting_web()
{
    $setting = DB::table('setting_app')->first();
    return $setting->app_name;
}

function set_show($uri)
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return 'show';
            }
        }
    } else {
        if (Route::is($uri)) {
            return 'show';
        }
    }
}


function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    echo $hasil_rupiah;
}

function errorMessage($errorCode)
{
    $errors = [
        [
            'code' => 1001,
            'message' => "System Busy",
        ],
        [
            "code" => 1003,
            "message" => "No Token, Please log in again"
        ],
        [
            "code" => 1004,
            "message" => "Invalid Token, Please log in again",
        ],
        [
            "code" => 1006,
            "message" => "Empty Param",
        ],
        [
            "code" => 1007,
            "message" => "Param Error",
        ],
        [
            "code" => 1008,
            "message" => "Query Error",
        ],
        [
            "code" => 1009,
            "message" => "Network Busy"
        ],
        [
            "code" => 1010,
            "message" => "Permission Denied",
        ],
        [
            "code" => 1011,
            "message" => "Region Subnet Not Exist",
        ],
        [
            "code" => 1012,
            "message" => "Region Subnet Already Exist",
        ],
        [
            "code" => 1013,
            "message" => "Extend Proto Not Exist",
        ],
        [
            "code" => 1014,
            "message" => "Extend Proto Already Exist",
        ],
        [
            "code" => 1015,
            "message" => "Platform Conf Not Exist",
        ],
        [
            "code" => 1016,
            "message" => "Extend Proto Already Associate App",
        ],
        [
            "code" => 1017,
            "message" => "Region Subnet Not Support"
        ],
        [
            "code" => 1018,
            "message" => "Region Subnet Already Sync"
        ],
        [
            "code" => 2001,
            "message" => "Invalid Account",
        ],
        [
            "code" => 2002,
            "message" => "Account Not Exist",
        ],
        [
            "code" => 2003,
            "message" => "Account Already Exist",
        ],
        [
            "code" => 2004,
            "message" => "Account or Passwd Error"
        ],
        [
            "code" => 3001,
            "message" => "Application Not Exist",
        ],
        [
            "code" => 3002,
            "message" => "Application Already Exist",
        ],
        [
            "code" => 3003,
            "message" => "Application Batch Delete Error"
        ],
        [
            "code" => 4001,
            "message" => "Device Not Exist",
        ],
        [
            "code" => 4002,
            "message" => "Device Already Exist",
        ],
        [
            "code" => 4003,
            "message" => "Device Update Error",
        ],
        [
            "code" => 4004,
            "message" => "Device Duplicate DevAddr And NwkSKey"
        ],
        [
            "code" => 4005,
            "message" => "Device Count Exceeds Limit"
        ],
        [
            "code" => 4006,
            "message" => "Device Batch Delete Error"
        ],
        [
            "code" => 5001,
            "message" => "Gateway Not Exist"
        ],
        [
            "code" => 5002,
            "message" => "Gateway Already Exist",
        ],
        [
            "code" => 5003,
            "message" => "GatewayID Already Exist",
        ],
        [
            "code" => 5004,
            "message" => "GatewayName Already Exist",
        ],
        [
            "code" => 5005,
            "message" => "Gateway Count Exceeds Limit",
        ],
        [
            "code" => 5006,
            "message" => "Gateway Batch Delete Error"
        ],
        [
            "code" => 14001,
            "message" => "MCGroup Not Exist",
        ],
        [
            "code" => 14002,
            "message" => "MCGroup Already Exist"
        ],
        [
            "code" => 14003,
            "message" => "MCGroup Duplicate DevAddr And NwkSKey",
        ],
        [
            "code" => 14004,
            "message" => "MCGroup Device Count Exceeds Limit"
        ],
        [
            "code" => 14005,
            "message" => "MCGroup Name Already Exist",
        ],
        [
            "code" => 14006,
            "message" => "MCGroup GenAppKey Error",
        ],
        [
            "code" => 14007,
            "message" => "MCGroup Batch Delete Error",
        ],
        [
            "code" => 14008,
            "message" => "MCDevice Batch Bind Error",
        ],
        [
            "code" => 14009,
            "message" => "MCDevice Batch Unbind Error",
        ],
        [
            "code" => 14010,
            "message" => "MCDevice Already Bind Current Group",
        ],
        [
            "code" => 14011,
            "message" => "MCDevice Already Bind Other Group",
        ],
        [
            "code" => 14012,
            "message" => "MCDevice Incompatible With Group",
        ],
        [
            "code" => 14013,
            "message" => "MCDevice Not Exist",
        ],
        [
            "code" => 14014,
            "message" => "MCGroup Not Enable MCRemote",
        ],
        [
            "code" => 14015,
            "message" => "MCGateway Batch Bind Error",
        ],
        [
            "code" => 14016,
            "message" => "MCGateway Batch Unbind Error",
        ],
        [
            "code" => 14017,
            "message" => "MCGateway Already Bind Current Group",
        ],
        [
            "code" => 14018,
            "message" => "MCGateway Incompatible With Group",
        ],
        [
            "code" => 14019,
            "message" => "MCGateway Not Exist",
        ],
        [
            "code" => 14020,
            "message" => "MCDownlink Already Exist",
        ],
        [
            "code" => 14021,
            "message" => "MCDownlink Not Exist",
        ],
        [
            "code" => 14022,
            "message" => "MCGroup Create Error",
        ],
        [
            "code" => 14023,
            "message" => "MCGroup invalid create",
        ],
        [
            "code" => 16001,
            "message" => "Fuota Deployment Already Exist"
        ]
    ];

    foreach ($errors as $i => $error) {
        if ($errors[$i]['code'] == $errorCode) {
            return $errors[$i];
        }
    }

    return [];
}

function base64toHex($string)
{
    $binary = base64_decode($string);
    return bin2hex($binary);
}

function littleEndian($str)
{
    return bin2hex(implode(array_reverse(str_split(hex2bin($str)))));
}

function insertGateway($gwid, $time)
{
    $gateway = DB::table('gateway')
        ->where('gwid', '=', $gwid)
        ->count();
    if ($gateway < 1) {
        DB::table('gateway')->insert([
            'gwid' => $gwid,
            'created_at' => $time,
            'updated_at' => $time,
        ]);
    } else {
        DB::table('gateway')
            ->where('gwid', $gwid)
            ->update(['updated_at' => $time]);
    }
}

function createTiket($device_id, $devEUI, $type_device, $data)
{

    if ($data != null) {

        // get subintance
        $subintanceData = DB::table('devices')
            ->join('clusters', 'devices.cluster_id', '=', 'clusters.id')
            ->select('clusters.subinstance_id')
            ->where('devices.id', $device_id)->first();
        if ($subintanceData) {
            $day = strtolower(date('l'));
            // get operational time
            $operationalDay = DB::table('operational_times')
                ->select('open_hour', 'closed_hour')
                ->where('day', $day)
                ->where('subinstance_id', $subintanceData->subinstance_id)
                ->first();
            if ($operationalDay) {
                if ($operationalDay->open_hour != null && $operationalDay->closed_hour != null) {

                    $abnormal = [];
                    $i = 1;
                    foreach ($data as $key => $value) {
                        // get toleransi
                        $ToleranceAlerts = DB::table('setting_tolerance_alerts')
                            ->select('min_tolerance', 'max_tolerance')
                            ->where('field_data', $key)
                            ->where('type_device', $type_device)
                            ->where('subinstance_id', $subintanceData->subinstance_id)
                            ->first();
                        if ($value < $ToleranceAlerts->min_tolerance) {
                            array_push($abnormal, "$key less than $ToleranceAlerts->min_tolerance reading results $value");
                        } else if ($value > $ToleranceAlerts->max_tolerance) {
                            array_push($abnormal, "$key more than $ToleranceAlerts->max_tolerance reading results $value");
                        }
                    }
                    Ticket::create([
                        'subject' => "Alert from device " . $devEUI,
                        'description'  => json_encode($abnormal),
                        'is_device'   => 1,
                        'status'   => "alert",
                    ]);
                }
            }
        }
    }
}


function handleWaterMeter($device_id, $request)
{
    $data = $request->data['data'];
    $hex = base64toHex($data);
    $frameId = substr($hex, 0, 2);
    if ($frameId == "00" || $frameId == "10" || $frameId == "71" || $frameId == "95" || $frameId == "21") {
        $save = Rawdata::create([
            'devEUI' => $request->devEUI,
            'appID'  => $request->appID,
            'type'   => $request->type,
            'time'   => $request->time,
            'gwid'   => $request->data['gwid'],
            'rssi'   => $request->data['rssi'],
            'snr'    => $request->data['snr'],
            'freq'   => $request->data['freq'],
            'dr'     => $request->data['dr'],
            'adr'    => $request->data['adr'],
            'class'  => $request->data['class'],
            'fcnt'   => $request->data['fCnt'],
            'fport'  => $request->data['fPort'],
            'confirmed' => $request->data['confirmed'],
            'data'  => $request->data['data'],
            'convert'  => base64toHex($request->data['data']),
            'gws'   => json_encode($request->data['gws']),
            'payload_data' => json_encode($request->all()),
        ]);
        $lastInsertedId = $save->id;
        insertGateway($request->data['gwid'], $save->updated_at);
        if ($frameId == "00") {
            $uplinkInterval = hexdec(littleEndian(substr($hex, 2, 4)));
            $batraiStatus = hexdec(littleEndian(substr($hex, 6, 2)));

            if ($batraiStatus > 254) {
                $batt = 'Unknown';
            } else if ($batraiStatus == 00 || $batraiStatus == '00') {
                $batt = 'Power Supply';
            } else {
                $batt = $batraiStatus / 2.54;
            }

            $temperatur = hexdec(littleEndian(substr($hex, 8, 4))) * 0.01;
            $totalFlow = hexdec(littleEndian(substr($hex, 12, 16))) * 0.1;
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'uplink_interval' => $uplinkInterval,
                'batrai_status' => $batt,
                'temperatur' => $temperatur,
                'total_flow' => $totalFlow,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $dataAbnormal = [
                'temperature' => $temperatur,
                'water_bateray' => $batt
            ];
        } else if ($frameId == "10") {
            $temperatur = hexdec(littleEndian(substr($hex, 2, 4))) * 0.01;
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'temperatur' => $temperatur,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $dataAbnormal = [
                'temperature' => $temperatur,
            ];
        } else if ($frameId == "71") {
            $totalFlow = hexdec(littleEndian(substr($hex, 2, 16))) * 0.01;
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'total_flow' => $totalFlow,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $dataAbnormal = [];
        } else if ($frameId == "95") {
            $batraiStatus = hexdec(littleEndian(substr($hex, 2, 2)));
            if ($batraiStatus > 254) {
                $batt = 'Unknown';
            } else if ($batraiStatus == 00 || $batraiStatus == '00') {
                $batt = 'Power Supply';
            } else {
                $batt = $batraiStatus / 2.54;
                $dataAbnormal = [
                    'water_bateray' => $batt,
                ];
            }
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'batrai_status' => $batt,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $dataAbnormal = [];
        } else if ($frameId == "21") {
            if ($hex == '2101') {
                $status_valve = 'Open';
            } else if ($hex == '2181') {
                $status_valve = 'Close';
            } else {
                $status_valve = 'Unknown';
            }
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'status_valve' => $status_valve,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $dataAbnormal = [];
        }

        $yesterdayStart = Carbon::now()->subDay(2)->hour(00)->minute(00)->second(00);
        $yesterdayEnd   = Carbon::now()->subDay(2)->hour(23)->minute(59)->second(59);
        $today = Carbon::today()->format('Y-m-d');
        $yesterdayData = ParsedWaterMater::where('device_id', $device_id)
            ->whereBetween("created_at", [$yesterdayStart, $yesterdayEnd])
            ->orderBy('created_at', 'desc')
            ->first();

        DB::table('parsed_water_meter')->insert($params);
        DB::table('master_latest_datas')
            ->where('device_id', $device_id)
            ->update($params);
        createTiket($device_id, $request->devEUI, $type_device = 'water_meter', $dataAbnormal);

        if (isset($params['total_flow'])) {
            if ($yesterdayData) {
                $usage = floatval($params['total_flow']) - floatval($yesterdayData->total_flow);
            } else {
                $usage = floatval($params['total_flow']);
            }

            $dailyUsage = DailyUsageDevice::where('date', $today)->where('device_id', $device_id)->first();

            if (!$dailyUsage) {
                DailyUsageDevice::create(
                    [
                        'device_id' => $device_id,
                        'device_type' => 'water_meter',
                        'date' => $today,
                        'usage' => $usage,
                    ]
                );
            } else {
                $dailyUsage->update([
                    'device_id' => $device_id,
                    'device_type' => 'water_meter',
                    'date' => $today,
                    'usage' => $usage,
                ]);
            }
        }
        return "success";
    } else if ($frameId == "0f") {
        $save = Rawdata::create([
            'devEUI' => $request->devEUI,
            'appID'  => $request->appID,
            'type'   => $request->type,
            'time'   => $request->time,
            'gwid'   => $request->data['gwid'],
            'rssi'   => $request->data['rssi'],
            'snr'    => $request->data['snr'],
            'freq'   => $request->data['freq'],
            'dr'     => $request->data['dr'],
            'adr'    => $request->data['adr'],
            'class'  => $request->data['class'],
            'fcnt'   => $request->data['fCnt'],
            'fport'  => $request->data['fPort'],
            'confirmed' => $request->data['confirmed'],
            'data'  => $request->data['data'],
            'convert'  => base64toHex($request->data['data']),
            'gws'   => json_encode($request->data['gws']),
            'payload_data' => json_encode($request->all()),
            'type_payload'  => 'Alert',
        ]);
        $lastInsertedId = $save->id;
        insertGateway($request->data['gwid'], $save->updated_at);
        // create tiket water meter cek operation time dan hour
        // get list alert
        $listFixedError = array(
            '0f1402' => 'Illegal Movement Warning',
            '0f1202' => 'Quick leak warning',
            '0f1203' => 'Slow air leak warning',
            '0f1002' => 'Temperature warning',
            '0f9501' => 'Low battery alarm',
            '0f9101' => 'Low voltage alarm',
            '0f1000' => 'High temperature alarm',
            '0f1001' => 'Low temperature alarm',
        );

        $bitError = array(
            0 => 'Tube failure (The pipe burst)',
            1 => 'Leakage failure',
            2 => 'Sensor failure',
            3 => 'Reverse installation position',
            4 => 'bit4',
            5 => 'bit5',
            6 => 'bit6',
            7 => 'bit7',
            8 => 'Abnormal sensor sound track',
            9 => 'The battery abnormity',
            10 => 'The valve abnormity',
            11 => 'Strong magnetic abnormity',
            12 => 'Abnormal power switch',
            13 => 'Hall sensor abnormity',
            14 => 'Reserve bit14',
            15 => 'Reserve bit15',
        );

        $convert = base64toHex($request->data['data']);
        $dataArr = str_split($convert, 6);
        $error = [];
        foreach ($dataArr as $code) {
            if (array_key_exists($code, $listFixedError)) {
                $getError = $listFixedError[$code];
                array_push($error, $getError);
            } else {
                $command = littleEndian(substr($hex, 2, 4));
                $arrCommand = str_split($command, 1);
                $index = 15;
                foreach ($arrCommand as  $value) {
                    $bin = base_convert($value, 16, 2);
                    $fix = str_pad($bin, 4, "0", STR_PAD_LEFT);
                    $dataArr2 = str_split($fix, 1);
                    foreach ($dataArr2 as $dataBin) {
                        if ($dataBin == "1") {
                            $getError = $bitError[$index];
                            array_push($error, $getError);
                        }
                        $index = $index - 1;
                    }
                }
            }
        }
        Ticket::create([
            'subject' => "Alert from device " . $request->devEUI,
            'description'  => json_encode($error),
            'is_device'   => 1,
            'status'   => "alert",
        ]);
        return "Alert Data Water Meter Success";
    } else {
        return "Payload Data Tidak Tercover";
    }
}

function handlePowerMeter($device_id, $request)
{
    $data = $request->data['data'];
    $hex = base64toHex($data);
    $frameId = substr($hex, 0, 2);
    // if ($frameId == "91") {
    if ($frameId == "91") {
        $idenfikasi = substr($hex, 4, 8);
        if ($idenfikasi == "02000006" || $idenfikasi == "02000106" || $idenfikasi == "02000206" || $idenfikasi == "02000306" || $idenfikasi == "02000406" || $idenfikasi == "ff050004") {
            $save = Rawdata::create([
                'devEUI' => $request->devEUI,
                'appID'  => $request->appID,
                'type'   => $request->type,
                'time'   => $request->time,
                'gwid'   => $request->data['gwid'],
                'rssi'   => $request->data['rssi'],
                'snr'    => $request->data['snr'],
                'freq'   => $request->data['freq'],
                'dr'     => $request->data['dr'],
                'adr'    => $request->data['adr'],
                'class'  => $request->data['class'],
                'fcnt'   => $request->data['fCnt'],
                'fport'  => $request->data['fPort'],
                'confirmed' => $request->data['confirmed'],
                'data'  => $request->data['data'],
                'convert'  => base64toHex($request->data['data']),
                'gws'   => json_encode($request->data['gws']),
                'payload_data' => json_encode($request->all()),
            ]);
            $lastInsertedId = $save->id;
            insertGateway($request->data['gwid'], $save->updated_at);
        }
        if ($idenfikasi == "02000006") {
            $tegangan = littleEndian(substr($hex, 28, 4)) * 0.1;
            $arus = littleEndian(substr($hex, 40, 6)) / 1000;
            $frekuensi_pln = littleEndian(substr($hex, 58, 4)) / 100;
            $active_power = littleEndian(substr($hex, 64, 6)) / 10000;
            $power_factor = littleEndian(substr($hex, 114, 4)) / 1000;
            $total_energy = littleEndian(substr($hex, 132, 4)) / 100;
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'tegangan' => $tegangan,
                'arus' => $arus,
                'frekuensi_pln' => $frekuensi_pln,
                'active_power' => $active_power,
                'power_factor' => $power_factor,
                'total_energy' => $total_energy,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $dataAbnormal = [
                'tegangan' => $tegangan,
                'arus' => $arus
            ];
            // mini frame 1
        } else if ($idenfikasi == "02000106") {
            $tegangan = littleEndian(substr($hex, 22, 4)) * 0.1;
            $arus = littleEndian(substr($hex, 34, 6)) / 1000;
            $frekuensi_pln = littleEndian(substr($hex, 52, 4)) / 100;
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'tegangan' => $tegangan,
                'arus' => $arus,
                'frekuensi_pln' => $frekuensi_pln,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $dataAbnormal = [
                'tegangan' => $tegangan,
                'arus' => $arus
            ];
            // mini frame 2
        } else if ($idenfikasi == "02000206") {
            $active_power = littleEndian(substr($hex, 22, 6)) / 10000;
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'active_power' => $active_power,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $dataAbnormal = [];
            // mini frame 3
        } else if ($idenfikasi == "02000306") {
            $power_factor = littleEndian(substr($hex, 22, 4)) / 1000;
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'power_factor' => $power_factor,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ];
            // mini frame 4
        } else if ($idenfikasi == "02000406") {
            $total_energy = littleEndian(substr($hex, 22, 4)) / 100;
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'total_energy' => $total_energy,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $dataAbnormal = [];
        } else if ($idenfikasi == "ff050004") {
            $cek = substr($hex, 20, 1);
            $bin = base_convert($cek, 16, 2);
            $fix = str_pad($bin, 4, "0", STR_PAD_LEFT);
            $getBit6 = substr($fix, 1, 1);
            if ($getBit6 == 0) {
                $statusSw = 'ON';
            } else {
                $statusSw = 'OFF';
            }
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'status_switch' => $statusSw,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $dataAbnormal = [];
        }

        $yesterdayStart = Carbon::now()->subDay(2)->hour(00)->minute(00)->second(00);
        $yesterdayEnd   = Carbon::now()->subDay(2)->hour(23)->minute(59)->second(59);

        $today = Carbon::today()->format('Y-m-d');

        $yesterdayData = ParsedPowerMater::where('device_id', $device_id)
            ->whereBetween("created_at", [$yesterdayStart, $yesterdayEnd])
            ->orderBy('created_at', 'desc')
            ->first();

        DB::table('parsed_power_meter')->insert($params);
        DB::table('master_latest_data_power_meter')
            ->where('device_id', $device_id)
            ->update($params);

        createTiket($device_id, $request->devEUI, $type_device = 'power_meter', $dataAbnormal);

        if (isset($params['total_energy'])) {
            if ($yesterdayData) {
                $usage = floatval($params['total_energy']) - floatval($yesterdayData->total_energy);
            } else {
                $usage = floatval($params['total_energy']);
            }

            $dailyUsage = DailyUsageDevice::where('date', $today)->where('device_id', $device_id)->first();

            if (!$dailyUsage) {
                DailyUsageDevice::create(
                    [
                        'device_id' => $device_id,
                        'device_type' => 'power_meter',
                        'date' => $today,
                        'usage' => $usage,
                    ]
                );
            } else {
                $dailyUsage->update([
                    'device_id' => $device_id,
                    'device_type' => 'power_meter',
                    'date' => $today,
                    'usage' => $usage,
                ]);
            }
        }
    } else {
        $save = Rawdata::create([
            'devEUI' => $request->devEUI,
            'appID'  => $request->appID,
            'type'   => $request->type,
            'time'   => $request->time,
            'gwid'   => $request->data['gwid'],
            'rssi'   => $request->data['rssi'],
            'snr'    => $request->data['snr'],
            'freq'   => $request->data['freq'],
            'dr'     => $request->data['dr'],
            'adr'    => $request->data['adr'],
            'class'  => $request->data['class'],
            'fcnt'   => $request->data['fCnt'],
            'fport'  => $request->data['fPort'],
            'confirmed' => $request->data['confirmed'],
            'data'  => $request->data['data'],
            'convert'  => base64toHex($request->data['data']),
            'gws'   => json_encode($request->data['gws']),
            'payload_data' => json_encode($request->all()),
        ]);
        $lastInsertedId = $save->id;
        insertGateway($request->data['gwid'], $save->updated_at);
        $temp = DB::table('temp_status_switch')->where('dev_eui', $request->devEUI)->first();
        if ($hex == '9c00') {
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'status_switch' => $temp->status,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        } else {

            $bitError = array(
                0 => 'Other error',
                1 => 'No request data',
                2 => 'Password wrong/Unauthorized',
                3 => 'Communication rate cannot be changed',
                4 => 'The number of time zone exceeded',
                5 => 'The number of sessions exceeded',
                6 => 'The number of rates exceeded',
                7 => 'Reserve',
            );
            $error = [];
            $cek = substr($hex, -2);
            $split = str_split($cek, 1);
            $index = 7;
            foreach ($split as $value) {
                $bin = base_convert($value, 16, 2);
                $fix = str_pad($bin, 4, "0", STR_PAD_LEFT);
                $dataArr2 = str_split($fix, 1);
                foreach ($dataArr2 as $dataBin) {
                    if ($dataBin == "1") {
                        $getError = $bitError[$index];
                        array_push($error, $getError);
                    }
                    $index = $index - 1;
                }
            }
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'status_switch' => json_encode($error),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        DB::table('parsed_power_meter')->insert($params);
        DB::table('master_latest_data_power_meter')
            ->where('device_id', $device_id)
            ->update($params);
        // delete temp
        DB::table('temp_status_switch')->where('id', $temp->id)->delete();
    }
    return "success";
    // } else {
    //     return "Payload Data Tidak Tercover";
    // }
}

function handleGasMeter($device_id, $request)
{
    $data = $request->data['data'];
    $hex = base64toHex($data);
    $frameId = substr($hex, 0, 2);

    $command = substr($hex, 16, 4);
    // return untuk command toptup tidak perlu parced data
    if ($command == 'c400' || $command == '8407' || $command == '8400') {
        if ($command == 'c400') {
            $type_payload = 'Topup Gas Error';
        } else if ($command == '8407') {
            $type_payload = 'Topup Gas Success';
        } else if ($command == '8400') {
            $type_payload = 'Command Gas Meter';
        }
        $save = Rawdata::create([
            'devEUI' => $request->devEUI,
            'appID'  => $request->appID,
            'type'   => $request->type,
            'time'   => $request->time,
            'gwid'   => $request->data['gwid'],
            'rssi'   => $request->data['rssi'],
            'snr'    => $request->data['snr'],
            'freq'   => $request->data['freq'],
            'dr'     => $request->data['dr'],
            'adr'    => $request->data['adr'],
            'class'  => $request->data['class'],
            'fcnt'   => $request->data['fCnt'],
            'fport'  => $request->data['fPort'],
            'confirmed' => $request->data['confirmed'],
            'data'  => $request->data['data'],
            'convert'  => base64toHex($request->data['data']),
            'gws'   => json_encode($request->data['gws']),
            'payload_data' => json_encode($request->all()),
            'type_payload'  => $type_payload,
        ]);
        insertGateway($request->data['gwid'], $save->updated_at);

        if ($command == '8400') {
            $lastInsertedId = $save->id;
            $temp = DB::table('temp_status_valve_gas_meter')->where('dev_eui', $request->devEUI)->first();
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'valve_status' => $temp->status_valve,
                'created_at' => $save->updated_at,
                'updated_at' => $save->updated_at,
            ];
            // $dataAbnormal = [];
            DB::table('parsed_gas_meter')->insert($params);
            DB::table('master_latest_data_gas_meter')
                ->where('device_id', $device_id)
                ->update($params);
            // ramdan
            DB::table('temp_status_valve_gas_meter')->where('id', $temp->id)->delete();
        } else if ($command == 'c400') {
            $getDevice = DB::table('devices')->where('devEUI', $request->devEUI)->first();
            $getHistory = DB::table('history_topup_gas_meter')->where('device_id', $getDevice->id)->whereNull('updated_at')->first();
            DB::table('history_topup_gas_meter')
                ->where('id', $getHistory->id)
                ->update([
                    'status' => 'Error',
                    'updated_at' => $save->updated_at,
                ]);
        } else if ($command == '8407') {
            $getDevice = DB::table('devices')->where('devEUI', $request->devEUI)->first();
            $getHistory = DB::table('history_topup_gas_meter')->where('device_id', $getDevice->id)->whereNull('updated_at')->first();
            DB::table('history_topup_gas_meter')
                ->where('id', $getHistory->id)
                ->update([
                    'status' => 'Success',
                    'updated_at' => $save->updated_at,
                ]);
        }
        return "success";
    } else {
        $save = Rawdata::create([
            'devEUI' => $request->devEUI,
            'appID'  => $request->appID,
            'type'   => $request->type,
            'time'   => $request->time,
            'gwid'   => $request->data['gwid'],
            'rssi'   => $request->data['rssi'],
            'snr'    => $request->data['snr'],
            'freq'   => $request->data['freq'],
            'dr'     => $request->data['dr'],
            'adr'    => $request->data['adr'],
            'class'  => $request->data['class'],
            'fcnt'   => $request->data['fCnt'],
            'fport'  => $request->data['fPort'],
            'confirmed' => $request->data['confirmed'],
            'data'  => $request->data['data'],
            'convert'  => base64toHex($request->data['data']),
            'gws'   => json_encode($request->data['gws']),
            'payload_data' => json_encode($request->all()),
        ]);
    }
    $lastInsertedId = $save->id;
    insertGateway($request->data['gwid'], $save->updated_at);

    $bitError1 = array(
        0 => 'Valve Close',
        1 => 'Valve error',
        2 => 'Magnetic alarm',
        3 => 'Meter cover was opened',
        4 => 'Battery low',
        5 => 'Spare',
        6 => 'Pospaid',
        7 => 'OverFlow',
    );

    $bitError0 = array(
        0 => 'Valve Open',
        1 => 'Valve No Error',
        2 => 'Magnetic Alarm Normal',
        3 => 'Meter Cover Normal',
        4 => 'Battery Normal',
        5 => 'Spare',
        6 => 'Prepaid',
        7 => 'No OverFlow',
    );

    if ($frameId == "68") {
        // cek type postpaid or prepaid
        $type = substr($hex, 18, 2);

        $gas_consumption = littleEndian(substr($hex, 34, 8));
        $fix_gas = pengurangGasMeter($gas_consumption) * 0.01;
        if ($type == "15") {
            $gas_total_purchase = littleEndian(substr($hex, 42, 8));
            $fix_gas_total_purchase = pengurangGasMeter($gas_total_purchase) * 0.01;
            $purchase_remain = littleEndian(substr($hex, 50, 8));
            $fix_purchase_remain = pengurangGasMeter($purchase_remain) * 0.01;
            $balance_of_battery = littleEndian(substr($hex, 60, 2));
            $fix_balance_of_battery = hexdec(pengurangGasMeter($balance_of_battery));
            $meter_status_word = littleEndian(substr($hex, 58, 2));
            $fix_status_word = pengurangGasMeter($meter_status_word);
        } else if ('0d') {
            $fix_gas_total_purchase = 0;
            $fix_purchase_remain = 0;
            $balance_of_battery = littleEndian(substr($hex, 44, 2));
            $fix_balance_of_battery = hexdec(pengurangGasMeter($balance_of_battery));
            $meter_status_word = littleEndian(substr($hex, 42, 2));
            $fix_status_word = pengurangGasMeter($meter_status_word);
        }

        $arrCommand = str_split($fix_status_word, 1);
        // return $arrCommand;
        $index = 7;
        $error = [];
        $errorTiket = [];
        foreach ($arrCommand as  $value) {
            $bin = base_convert($value, 16, 2);
            $fix = str_pad($bin, 4, "0", STR_PAD_LEFT);
            $dataArr2 = str_split($fix, 1);
            foreach ($dataArr2 as $dataBin) {
                if ($dataBin == "1") {
                    $getError = $bitError1[$index];
                    array_push($error, $getError);
                    if ($index == 7 || $index == 4 || $index == 3 || $index == 2 || $index == 1) {
                        array_push($errorTiket, $getError);
                    }
                    // get status valve
                    if ($index == 0) {
                        $status_valve = $getError;
                    }
                } else {
                    $getError = $bitError0[$index];
                    // get status valve
                    if ($index == 0) {
                        $status_valve = $getError;
                    }
                    array_push($error, $getError);
                }
                $index = $index - 1;
            }
        }

        $count = count($errorTiket);
        if ($count > 0) {
            Ticket::create([
                'subject' => "Alert from device " . $request->devEUI,
                'description'  => json_encode($errorTiket),
                'is_device'   => 1,
                'status'   => "alert",
            ]);
        }

        $params = [
            'rawdata_id' => $lastInsertedId,
            'device_id' => $device_id,
            'frame_id' => $frameId,
            'gas_consumption' =>  $fix_gas,
            'gas_total_purchase' => $fix_gas_total_purchase,
            'purchase_remain' => $fix_purchase_remain,
            'balance_of_battery' => $fix_balance_of_battery,
            'meter_status_word' => json_encode($error),
            'valve_status' =>  $status_valve,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $dataAbnormal = [
            'purchase_remain' => $fix_purchase_remain,
            'gas_bateray' => $fix_balance_of_battery
        ];
    }

    $yesterdayStart = Carbon::now()->subDay(2)->hour(00)->minute(00)->second(00);
    $yesterdayEnd   = Carbon::now()->subDay(2)->hour(23)->minute(59)->second(59);

    $today = Carbon::today()->format('Y-m-d');

    $yesterdayData = ParsedGasMater::where('device_id', $device_id)
        ->whereBetween("created_at", [$yesterdayStart, $yesterdayEnd])
        ->orderBy('created_at', 'desc')
        ->first();

    DB::table('parsed_gas_meter')->insert($params);
    DB::table('master_latest_data_gas_meter')
        ->where('device_id', $device_id)
        ->update($params);
    createTiket($device_id, $request->devEUI, $type_device = 'gas_meter', $dataAbnormal);

    if (isset($params['gas_consumption'])) {
        if ($yesterdayData) {
            $usage = floatval($params['gas_consumption']) - floatval($yesterdayData->gas_consumption);
        } else {
            $usage = floatval($params['gas_consumption']);
        }

        $dailyUsage = DailyUsageDevice::where('date', $today)->where('device_id', $device_id)->first();

        if (!$dailyUsage) {
            DailyUsageDevice::create(
                [
                    'device_id' => $device_id,
                    'device_type' => 'gas_meter',
                    'date' => $today,
                    'usage' => $usage,
                ]
            );
        } else {
            $dailyUsage->update([
                'device_id' => $device_id,
                'device_type' => 'gas_meter',
                'date' => $today,
                'usage' => $usage,
            ]);
        }
    }


    return "success";
}

function pengurangGasMeter($data)
{
    // split
    $arr = str_split($data, 2);
    $string = '';
    foreach ($arr as $row) {
        $splitPartial =   str_split($row, 1);
        foreach ($splitPartial as $datas) {
            if ($datas < 10) {
                $jml = $datas - 3;
                $string .= $jml;
            } else {
                $a = cekAngka($datas);
                $jml = $a - 3;
                $string .= $jml;
            }
        }
    }
    $cek =  (int)  $string;
    $cek2 = str_pad($cek, 2, "0", STR_PAD_LEFT);
    return $cek2;
}

function konversiTime($splitDate)
{
    $string = '';
    foreach ($splitDate as $row) {
        $splitPartial =   str_split($row, 1);
        foreach ($splitPartial as $datas) {
            $jml = $datas + 3;
            if ($jml < 10) {
                $string .= $jml;
            } else {
                $a = cekAbjHex($jml);
                $string .= $a;
            }
        }
    }
    $rev = str_split($string, 2);
    $cek = array_reverse($rev);
    $fexRev = '';
    foreach ($cek as $value) {
        $fexRev .= $value;
    }
    return $fexRev;
}

function konversiM3($split)
{
    $datam3 = '';
    foreach ($split as $value) {
        $jmlm3 = $value + 3;
        if ($jmlm3 < 10) {
            $datam3 .= $jmlm3;
        } else {
            $a = cekAbjHex($jmlm3);
            $datam3 .= $a;
        }
    }
    return $datam3;
}

function cekAbjHex($decimal)
{
    if ($decimal == 10) {
        return 'a';
    } else if ($decimal == 11) {
        return 'b';
    } else if ($decimal == 12) {
        return 'c';
    } else if ($decimal == 13) {
        return 'd';
    } else if ($decimal == 14) {
        return 'e';
    } else if ($decimal == 15) {
        return 'f';
    }
}

function cekAngka($huruf)
{
    if ($huruf == 'a') {
        return 10;
    } else if ($huruf == 'b') {
        return 11;
    } else if ($huruf == 'c') {
        return 12;
    } else if ($huruf == 'd') {
        return 13;
    } else if ($huruf == 'e') {
        return 14;
    } else if ($huruf == 'f') {
        return 15;
    }
}
