<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Rawdata;
use App\Models\Ticket;

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
        } else if ($frameId == "95") {
            $batraiStatus = hexdec(littleEndian(substr($hex, 2, 2)));
            if ($batraiStatus > 254) {
                $batt = 'Unknown';
            } else if ($batraiStatus == 00 || $batraiStatus == '00') {
                $batt = 'Power Supply';
            } else {
                $batt = $batraiStatus / 2.54;
            }
            $params = [
                'rawdata_id' => $lastInsertedId,
                'device_id' => $device_id,
                'frame_id' => $frameId,
                'batrai_status' => $batt,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
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
        }
        DB::table('parsed_water_meter')->insert($params);
        DB::table('master_latest_datas')
            ->where('device_id', $device_id)
            ->update($params);
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
            'subject' => "Alert dari Device " . $request->devEUI,
            'description'  => "Abnormal indications on : " . json_encode($error),
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
    if ($frameId == "91") {
        if ($frameId == "91") {
            $idenfikasi = substr($hex, 4, 8);
            if ($idenfikasi == "02000006" || $idenfikasi == "02000106" || $idenfikasi == "02000206" || $idenfikasi == "02000306" || $idenfikasi == "02000406") {
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
            }
            DB::table('parsed_power_meter')->insert($params);
            DB::table('master_latest_data_power_meter')
                ->where('device_id', $device_id)
                ->update($params);
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
        }
        return "success";
    } else {
        return "Payload Data Tidak Tercover";
    }
}

function handleGasMeter($device_id, $request)
{
    $data = $request->data['data'];
    $hex = base64toHex($data);
    $frameId = substr($hex, 0, 2);
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
        } else {
            $fix_gas_total_purchase = 0;
            $fix_purchase_remain = 0;
            $balance_of_battery = littleEndian(substr($hex, 44, 2));
            $fix_balance_of_battery = hexdec(pengurangGasMeter($balance_of_battery));

            $meter_status_word = littleEndian(substr($hex, 42, 2));
            $fix_status_word = pengurangGasMeter($meter_status_word);
            // return $fix_status_word;
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
                'subject' => "Alert dari Device " . $request->devEUI,
                'description'  => "Abnormal indications on : " . json_encode($errorTiket),
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
    }
    DB::table('parsed_gas_meter')->insert($params);
    DB::table('master_latest_data_gas_meter')
        ->where('device_id', $device_id)
        ->update($params);
    return "success";
}

function pengurangGasMeter($data)
{
    $lengt_gas_consumption = strlen($data);
    $pengurang =  str_pad(3, $lengt_gas_consumption, 3, STR_PAD_LEFT);
    $cek =  (int)  $data - (int) $pengurang;
    return str_pad($cek, 2, "0", STR_PAD_LEFT);
}
