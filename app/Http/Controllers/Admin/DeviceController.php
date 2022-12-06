<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Subnet;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $device = Device::with('subnet')->get();

            return DataTables::of($device)
                ->addIndexColumn()
                ->addColumn('subnet', function($row) {
                    if ($row->subnet) {
                        return $row->subnet->subnet;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('action', 'admin.device._action')
                ->toJson();
        }

        return view('admin.device.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subnets = Subnet::all();

        return view('admin.device.create', compact('subnets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'appID'         => 'required',
            'appEUI'        => 'required',
            'appKey'        => 'required',
            'devType'       => 'required',
            'devName'       => 'required',
            'devEUI'        => 'required',
            'region'        => 'required',
            'subnet_id'     => 'required',
            'supportClassB' => 'required',
            'supportClassC' => 'required',
            'macVersion'    => 'required',
            'authType'      => 'required',
        ];

        if(request('authType') == 'abp'){
            $rules['appSKey'] = 'required';
            $rules['nwkSKey'] = 'required';
            $rules['devAddr'] = 'required';
        }

        $attr = request()->validate($rules);

        try {


            $url_endpoint = 'https://wspiot.xyz/openapi/device/create';
            $api_token   = env('APITOKEN', 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c=');

            // $client = new Client;

            // $headers = [
            //     'Content-Type'          => 'application/json',
            //     'x-access-token' => $api_token,
            // ];

            // dd($attr);

            // $res= $client->post($url_endpoint, [
	        //         'headers'           => $headers,
	        //         'json'              => $attr,
	        //         'force_ip_resolve'  => 'v4',
	        //         'http_errors'       => false,
	        //         'timeout'           => 120,
	        //         'connect_timeout'   => 10,
	        //         'allow_redirects'   => false,
	        //         'verify'			=> false,
	        //     ]);

            // $curlOptions = [
            //     CURLOPT_SSL_VERIFYPEER => 0,
            //     CURLOPT_SSL_VERIFYHOST => 0
            // ];

            // $res = Http::withOptions([
            //     'curl' => $curlOptions,
            // ])->withHeaders([
            //     'x-access-token' => $api_token,
            //     'Authorization' => 'Bearer '.$api_token,
            // ])->post($url_endpoint, $attr);

           // $response = $res->getBody()->getContents();

            //dd($response);

        $header = [
            'Authorization: Bearer '.$api_token,
            'Content-Type: application/json',
            'x-access-token: '.$api_token
        ];

        $curl = curl_init();
        curl_setopt($curl,CURLOPT_FRESH_CONNECT,true);
        curl_setopt($curl,CURLOPT_URL,$url_endpoint);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        curl_setopt($curl,CURLOPT_FAILONERROR,false);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($attr));
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

        $result = curl_exec($curl);
        $error  = curl_error($curl);
        $errno  = curl_errno($curl);
        curl_close($curl);
            dd($result);

            $result = json_decode($result);

            Device::create($attr);

            Alert::toast('Device successfully created', 'success');
        } catch (Exception $err) {
            \Log::error($err);
            Alert::toast('Failed to save records', 'error');
        }

        return redirect()->route('device.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $subnets = Subnet::all();
        return view('admin.device.edit', compact('device', 'subnets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $rules = [
            'appID'         => 'required',
            'appEUI'        => 'required',
            'appKey'        => 'required',
            'devType'       => 'required',
            'devName'       => 'required',
            'devEUI'        => 'required',
            'region'        => 'required',
            'subnet_id'        => 'required',
            'supportClassB' => 'required',
            'supportClassC' => 'required',
            'macVersion'    => 'required',
        ];

        if (request('authType') == 'abp') {
            $rules['appSKey'] = 'required';
            $rules['nwkSKey'] = 'required';
            $rules['devAddr'] = 'required';
        }

        $attr = request()->validate($rules);

        try {
            $device->update($attr);
            Alert::toast('Device successfully updated', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to update records', 'error');
        }

        return redirect()->route('device.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        try {
            $device->delete();
            Alert::toast('Device successfully deleted', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to delete records', 'error');
        }

        return redirect()->route('device.index');
    }
}
