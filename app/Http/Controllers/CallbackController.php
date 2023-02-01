<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Rawdata;
use App\Models\SettingApp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CallbackController extends Controller
{
    public function index(Request $request)
    {
        // $header = $request->header('Authorization');

        // if (!$header) {
        //     return response()->json(['message' => 'Invalid bearer Token'], 403);
        // }

        // $setting = SettingApp::first();

        // $token = substr($header, 7);

        // if ($setting->token_callback != $token) {
        //     return response()->json(['success' => 'false', 'message' => 'Invalid Bearer Token'], 403);
        // }

        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'devEUI'    => 'required',
        //         'appID'     => 'required',
        //         'type'      => 'required',
        //         'time'      => 'required',
        //         'data'      => 'required'
        //     ]
        // );

        // if ($validator->fails()) {
        //     return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        // }
        try {
            // cek callback gateway or device
            if ($request->type == 'gwstat' || $request->type == 'gwconnection') {
                insertGateway($request->gwID, date('Y-m-d H:i:s'), $request->data['online'], $request->data['_pktfwdStatus']);
                return response()->json([
                    'message' => 'Callback Gateway Success',
                ], 200);
            } else {
                // cek device tedaftar pada aplikasi atw tidak
                $device = Device::where('devEUI', $request->devEUI)->first();
                if ($device) {
                    $categoryDevice = $device->category;
                    if ($categoryDevice == 'Water Meter') {
                        $respondHandler = handleWaterMeter($device->id, $request);
                    } else if ($categoryDevice == 'Power Meter') {
                        $respondHandler = handlePowerMeter($device->id, $request);
                    } else if ($categoryDevice == 'Gas Meter') {
                        $respondHandler = handleGasMeter($device->id, $request);
                    }

                    if ($respondHandler == 'success') {
                        return response()->json([
                            'message' => 'Callback Device Success',
                        ], 200);
                    } else {
                        return response()->json([
                            'message' => $respondHandler,
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'message' => 'Device Tidak Di Temukan',
                    ], 404);
                }
            }
        } catch (Exception $err) {
            return response()->json(['success' => false, 'message' => $err->getMessage()], 500);
        }
    }
}
