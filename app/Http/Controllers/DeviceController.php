<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

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
            return DataTables::of(Device::query())
                ->addIndexColumn()
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
        return view('admin.device.create');
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
            'subnet'        => 'required',
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
            Device::create($attr);
            Alert::toast('Device successfully created', 'success');
        } catch (Exception $err) {
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
        return view('admin.device.edit', compact('device'));
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
            'subnet'        => 'required',
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
