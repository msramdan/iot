<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

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


function handleWaterMeter($lastInsertedId,$data)
{
    $hex = base64toHex($data);
    $frameId = substr($hex, 0, 2);
    if ($frameId == "00") {
        $uplinkInterval = hexdec(littleEndian(substr($hex, 2, 4)));
        $batraiStatus = hexdec(littleEndian(substr($hex, 6, 2)));
        // return $batraiStatus;

        if($batraiStatus > 254){
            $batt = 'Unknown';
        }else if($batraiStatus == 00 || $batraiStatus == '00' ){
            $batt = 'Power Supply';
        }else{
            $batt = $batraiStatus / 2.54;
        }

        $temperatur = hexdec(littleEndian(substr($hex, 8, 4))) * 0.01;
        $totalFlow = hexdec(littleEndian(substr($hex, 12, 16))) * 0.1;
        $params =[
            'rawdata_id' => $lastInsertedId,
            'frame_id' => $frameId,
            'uplink_interval' => $uplinkInterval,
            'batrai_status' => $batt,
            'temperatur' => $temperatur,
            'total_flow' => $totalFlow,
            'created_at' => date('Y-m-d H:i:s'),
        ];
    } else if ($frameId == "10") {
        $temperatur = hexdec(littleEndian(substr($hex, 2, 4))) * 0.01;
         $params =[
            'rawdata_id' => $lastInsertedId,
            'frame_id' => $frameId,
            'temperatur' => $temperatur,
            'created_at' => date('Y-m-d H:i:s'),
         ];
    } else if ($frameId == "71") {
        $totalFlow = hexdec(littleEndian(substr($hex, 2, 16))) * 0.01;
        $params =[
            'rawdata_id' => $lastInsertedId,
            'frame_id' => $frameId,
            'total_flow' => $totalFlow,
            'created_at' => date('Y-m-d H:i:s'),
        ];
    } else if ($frameId == "95") {
        $batraiStatus = hexdec(littleEndian(substr($hex, 2, 2)));
        if($batraiStatus > 254){
            $batt = 'Unknown';
        }else if($batraiStatus == 00 || $batraiStatus == '00' ){
            $batt = 'Power Supply';
        }else{
            $batt = $batraiStatus / 2.54;
        }
        $params =[
            'rawdata_id' => $lastInsertedId,
            'frame_id' => $frameId,
            'batrai_status' => $batt,
            'created_at' => date('Y-m-d H:i:s'),
        ];
    }
    DB::table('parsed_water_mater')->insert($params);

    //update data master_latest_data
}
