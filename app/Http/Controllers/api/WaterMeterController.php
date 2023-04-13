<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class WaterMeterController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'applicationID'     => 'required',
                'data_value'        => 'required|regex:/^\d*(\.\d{3})?$/',
                'dev_eui'           => 'required',
                'timestamp'         => 'required',
            ],
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data'    => $validator->errors()
            ], 401);
        } else {
            try {
                // 1. Convert waktu
                $time = date("Y-m-d H:i:s", substr($request->input('timestamp'), 0, 10));
                // 2. get data device
                $device = DB::table('devices')
                    ->where('devEUI', $request->input('dev_eui'))
                    ->first();
                if (!$device) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Device tidak ditemukan',
                    ], 401);
                }
                // 3. update master_latest_datas dan insert parsed data dan daily
                if ($request->input('data_value')) {
                    DB::table('master_latest_datas')
                        ->where('device_id', $device->id)
                        ->update([
                            'total_flow' => $request->input('data_value'),
                            'created_at' => $time,
                            'updated_at' => $time,
                        ]);
                    DB::table('parsed_water_meter')->insert([
                        'device_id' => $device->id,
                        'total_flow' => $request->input('data_value'),
                        'created_at' => $time,
                        'updated_at' => $time,
                    ]);
                    DB::table('daily_usage_devices')->insert([
                        'device_id' => $device->id,
                        'cluster_id' => $device->cluster_id,
                        'device_type' => 'water_meter',
                        'date' => '',
                        'usage' => '',
                        'created_at' => $time,
                        'updated_at' => $time,
                    ]);
                }
                // 4. jika ada error tiket
                if ($request->input('data_errorNum')) {
                    DB::table('tickets')->insert([
                        'subject' => 'Alert from device ' . $request->input('dev_eui'),
                        'description' => $request->input('data_errorNum'),
                        'is_device' => 1,
                        'status' => 'alert',
                        'created_at' => $time,
                        'updated_at' => $time,
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan!',
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ], 401);
            }
        }
    }
}
