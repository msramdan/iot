<?php

namespace App\Http\Controllers;

use App\Models\Rawdata;
use Exception;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function index ()
    {
        $attr = request()->validate([
            'devEUI'    => 'required',
            'appID'     => 'required',
            'type'      => 'required',
            'time'      => 'required',
            'gwid'      => 'required',
            'rssi'      => 'required',
            'snr'       => 'required',
            'freq'      => 'required',
            'dr'        => 'required',
            'adr'       => 'required',
            'class'     => 'required',
            'fcnt'      => 'required',
            'fport'     => 'required',
            'confirmed' => 'required',
            'gws'       => 'required',
        ]);

        $data = request()->all();
        $data['payload_data'] = json_encode(request()->all());

        try{
            Rawdata::create($data);
            return response()->json([
                'message' => 'Callback success',
            ], 201);
        }catch(Exception $err){
            return $err;
        }
    }



}
