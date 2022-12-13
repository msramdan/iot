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

        $validator = Validator::make(
            $request->all(),
            [
                'devEUI'    => 'required',
                'appID'     => 'required',
                'type'      => 'required',
                'time'      => 'required',
                'data'      => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        try {
            // cek device tedaftar pada aplikasi atw tidak
            $device = Device::where('devEUI', $request->devEUI)->first();
            if($device){
                $categoryDevice =$device->category;
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
                    'gws'   => json_encode($request->data['gws']),
                    'payload_data' => json_encode($request->all()),
                ]);

                $lastInsertedId= $save->id;
                $dataRequest =$request->data['data'];
                if($categoryDevice=='Water Meter'){
                    handleWaterMeter($lastInsertedId,$dataRequest);
                }
                return response()->json([
                    'message' => 'Callback success',
                ], 201);

            }else{
                return response()->json([
                    'message' => 'Device Tidak Di Temukan',
                ], 404);
            }
            // parsed data by category


        } catch (Exception $err) {
            return response()->json(['success' => false, 'message' => $err->getMessage()], 500);
        }
    }
}
