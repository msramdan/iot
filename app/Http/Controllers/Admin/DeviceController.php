<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Subnet;
use App\Models\Instance;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Tymon\JWTAuth\Payload;

use function GuzzleHttp\json_decode;

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
        $intances = Instance::all();

        return view('admin.device.create', [
            'subnets' => $subnets,
            'appID' => $intances,
        ]);
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
            $subnet = Subnet::Where('id', $request->subnet_id)->first();

            $url_endpoint = 'https://wspiot.xyz/openapi/device/create';

            $api_token   = env('APITOKEN', 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c=');

            $payload = [
                "devEUI" => $request->devEUI,
                "appEUI" =>  $request->appEUI,
                "devType" =>  $request->devType,
                "devName" => $request->devName,
                "region"=> $request->region,
                "subnet"=> $subnet->subnet,
                "authType"=> $request->authType,
                "appID"=> intval($request->appID),
                "appKey"=> $request->appKey,
                "supportClassB"=>  $request->supportClassB == 'false' ? false : true ,
                "supportClassC"=>  $request->supportClassC == 'false' ? false : true,
                "macVersion"=> $request->macVersion
            ];

            $client = new Client;

            $headers = [
                'Content-Type'          => 'application/json',
                'x-access-token' => $api_token,
            ];

            $res= $client->post($url_endpoint, [
	                'headers'           => $headers,
	                'json'              => $payload,
	                'force_ip_resolve'  => 'v4',
	                'http_errors'       => false,
	                'timeout'           => 120,
	                'connect_timeout'   => 10,
	                'allow_redirects'   => false,
	                'verify'			=> false,
	            ]);

            $response = $res->getBody()->getContents();

            $response = json_decode($response);


            if ($response->code != 0) {
                $errorMessage = errorMessage($response->code);

                if (!empty($errorMessage)) {
                    Alert::toast('Failed to create device. '.$errorMessage['message'], 'error');
                } else {
                    Alert::toast('Failed to create device. ', 'error');
                }

                return redirect()->route('device.index');
            }

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
            $url_update = 'https://wspiot.xyz/openapi/device/update';
            $url_check_device = 'https://wspiot.xyz/openapi/device/status?devEUI='.$device->devEUI;

            $api_token   = env('APITOKEN', 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c=');

            $curlOptions = [
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_SSL_VERIFYHOST => 0
            ];

            $device_check = Http::withOptions([
                'curl' => $curlOptions,
            ])->withHeaders([
                'x-access-token' => $api_token
            ])->get($url_check_device);

            $response_check = $device_check->getBody()->getContents();
            $response_check = json_decode($response_check);

            if ($response_check->code != 0) {
                $errorMessage = errorMessage($response_check->code);

                if (!empty($errorMessage)) {
                    Alert::toast('Failed to update device! '.$errorMessage['message'], 'error');
                } else {
                    Alert::toast('Failed to update device!', 'error');
                }

                return redirect()->route('device.index');
            }

            $payload = [
                "devEUI" => $request->devEUI,
                "devName" => $request->devName,
            ];

            $client = new Client;

            $headers = [
                'Content-Type'          => 'application/json',
                'x-access-token' => $api_token,
            ];

            $res = $client->post($url_update, [
	                'headers'           => $headers,
	                'json'              => $payload,
	                'force_ip_resolve'  => 'v4',
	                'http_errors'       => false,
	                'timeout'           => 120,
	                'connect_timeout'   => 10,
	                'allow_redirects'   => false,
	                'verify'			=> false,
	            ]);

            $response = $res->getBody()->getContents();

            $response = json_decode($response);

            if ($response_check->code != 0) {
                $errorMessage = errorMessage($response_check->code);

                if (!empty($errorMessage)) {
                    Alert::toast('Failed to update device! '.$errorMessage['message'], 'error');
                } else {
                    Alert::toast('Failed to update device!', 'error');
                }

                return redirect()->route('device.index');
            }

            $device->update($attr);

            Alert::toast('Device successfully updated', 'success');
        } catch (Exception $err) {
            \Log::error($err);
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
            $url_endpoint = 'https://wspiot.xyz/openapi/device/delete';

            $api_token   = env('APITOKEN', 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c=');

            $payload = [
                "devEUIs" => [$device->devEUI],
            ];

            $client = new Client;

            $headers = [
                'Content-Type'          => 'application/json',
                'x-access-token' => $api_token,
            ];

            $res= $client->post($url_endpoint, [
	                'headers'           => $headers,
	                'json'              => $payload,
	                'force_ip_resolve'  => 'v4',
	                'http_errors'       => false,
	                'timeout'           => 120,
	                'connect_timeout'   => 10,
	                'allow_redirects'   => false,
	                'verify'			=> false,
	            ]);

            $response = $res->getBody()->getContents();

            $response = json_decode($response);


            if ($response->code != 0) {
                $errorMessage = errorMessage($response->code);

                if (!empty($errorMessage)) {
                    Alert::toast('Failed to Delete device. '.$errorMessage['message'], 'error');
                } else {
                    Alert::toast('Failed to delete device. ', 'error');
                }

                return redirect()->back();
            }

            $device->delete();
            Alert::toast('Device successfully deleted', 'success');
        } catch (Exception $err) {
            \Log::error($err);
            Alert::toast('Failed to delete records', 'error');
        }

        return redirect()->route('device.index');
    }
}
