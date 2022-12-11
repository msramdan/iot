<?php

namespace App\Http\Controllers;

use App\Models\Rawdata;
use App\Models\SettingApp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CallbackController extends Controller
{
    public function index (Request $request)
    {
        $header = $request->header('Authorization');

        if (!$header) {
            return response()->json(['message' => 'Invalid bearer Token'], 403);
        }

        $setting = SettingApp::first();

        $token = substr($header, 7);

        if ($setting->token_callback != $token) {
            return response()->json(['success' => 'false', 'message' => 'Invalid Bearer Token'], 403);
        }

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

        try{

            Rawdata::create([
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
                'data'  => json_encode($request->data),
                'gws'   => json_encode($request->data['gws']),
                'payload_data' => json_encode($request->all()),
            ]);

            return response()->json([
                'message' => 'Callback success',
            ], 201);
        }catch(Exception $err){
            return response()->json(['success' => false, 'message' => $err->getMessage()], 500);
        }
    }
}
