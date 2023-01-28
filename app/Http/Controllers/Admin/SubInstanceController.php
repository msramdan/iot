<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instance;
use App\Models\Subinstance;
use App\Models\OperationalTime;
use App\Models\SettingToleranceAlert;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SubInstanceController extends Controller
{
    public function create (Instance $instance)
    {
        $id = IdGenerator::generate([
            'table' => 'subinstances',
            'field' => 'code_subinstance',
            'length' => 16,
            'prefix' => 'SIN-' . date('Ymd')
        ]);

        $days = [
            'sunday',
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday'
        ];

        return view('admin.subinstance.create', compact('instance', 'id', 'days'));
    }

    public function store (Request $request, $instanceId)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'code_subinstance' => 'required',
                'name_subinstance' => 'required',
                'day.*' => 'required',
                'opening_hour.*' => 'nullable',
                'closing_hour.*' => 'nullable',
                'type_device.*' => 'required',
                'field_data.*' => 'required',
                'min_tolerance.*' => 'required',
                'max_tolerance.*' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $payload = $request->except(['_token']);

        $payload['instance_id'] = $instanceId;

        try {
            $subinstance = Subinstance::create($payload);

            /**
             * Intances Operational Time
             */
            $days = $request->day;
            $open_hour = $request->opening_hour;
            $closing_hour = $request->closing_hour;

            foreach ($days as $i => $day) {
                $operational_time = OperationalTime::create([
                    'subinstance_id' => $subinstance->id,
                    'day' => $day,
                    'open_hour' => $open_hour[$i],
                    'closed_hour' => $closing_hour[$i]
                ]);
            }
            /**
             * End Instances Operational Time
             */

            /**
             * Setting Device Tolerance Alert
             */
            $field_data = $request->field_data;
            $min_tolerance = $request->min_tolerance;
            $max_tolerance = $request->max_tolerance;
            $type_device = $request->type_device;

            foreach ($field_data as $a => $field) {
                $setting_tolerance = SettingToleranceAlert::create([
                    'subinstance_id' => $subinstance->id,
                    'type_device' => $type_device[$a],
                    'field_data' => $field,
                    'min_tolerance' => $min_tolerance[$a],
                    'max_tolerance' => $max_tolerance[$a]
                ]);
            }
            /**
             * End Setting Device Tolerance
             */
            Alert::toast('Subinstance successfully created', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to save records', 'error');
        }

        return redirect()->route('instance.index');
    }


    public function edit ($instanceId, Subinstance $subinstance)
    {
        $operational_times = OperationalTime::where('subinstance_id', $subinstance->id)->orderBy('id', 'asc')->get();
        $setting_water_tolerances = SettingToleranceAlert::where('subinstance_id', $subinstance->id)
            ->where('type_device', 'water_meter')
            ->orderBy('id', 'asc')
            ->get();
        $setting_power_tolerances = SettingToleranceAlert::where('subinstance_id', $subinstance->id)
            ->where('type_device', 'power_meter')
            ->orderBy('id', 'asc')
            ->get();
        $setting_gas_tolerances = SettingToleranceAlert::where('subinstance_id', $subinstance->id)
            ->where('type_device', 'gas_meter')
            ->orderBy('id', 'asc')
            ->get();

        $days = [
            'sunday',
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday'
        ];

        return view('admin.subinstance.edit', compact(
            'subinstance',
            'operational_times',
            'setting_water_tolerances',
            'setting_power_tolerances',
            'setting_gas_tolerances',
            'days'
        ));
    }

    public function update ($instanceId, Subinstance $subinstance, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'code_subinstance' => 'required',
                'name_subinstance' => 'required',
                'day.*' => 'required',
                'opening_hour.*' => 'nullable',
                'closing_hour.*' => 'nullable',
                'type_device.*' => 'required',
                'field_data.*' => 'required',
                'min_tolerance.*' => 'required',
                'max_tolerance.*' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $payload = $request->except(['_token']);

        try {
            $subinstance->update($payload);

            /** Update Operational Time */
            $operational_id = $request->operational_id; // array operational id
            $days = $request->day; // array days
            $opening_hours = $request->opening_hour; // array opening hour
            $closing_hours = $request->closing_hour; // array closing hour


            foreach ($operational_id as $i => $operational) {
                //dd($operational);
                $operational_time = OperationalTime::where('subinstance_id', $subinstance->id)
                    ->where('id', $operational)
                    ->first();

                if ($operational_time) {
                    $operational_time->update([
                        'day' => $days[$i],
                        'open_hour' => $opening_hours[$i],
                        'closed_hour' => $closing_hours[$i],
                    ]);
                } else {
                    $operational_time = OperationalTime::create([
                        'subinstance_id' => $subinstance->id,
                        'day' => $days[$i],
                        'open_hour' => $opening_hours[$i],
                        'closed_hour' => $closing_hours[$i]
                    ]);
                }
            }
            /** End Update Operational Time */

            /** Update setting alert device */
            $device_tolerance_id = $request->device_tolerance_id;
            $type_devices = $request->type_device;
            $field_datas = $request->field_data;
            $min_tolerances = $request->min_tolerance;
            $max_tolerances = $request->max_tolerance;

            foreach ($device_tolerance_id as $a => $tolerance_id) {
                $device_tolerance = SettingToleranceAlert::where('subinstance_id', $subinstance->id)
                    ->where('id', $tolerance_id)
                    ->first();

                if ($device_tolerance) {
                    $device_tolerance->update([
                        'type_device' => $type_devices[$a],
                        'field_data' => $field_datas[$a],
                        'min_tolerance' => $min_tolerances[$a],
                        'max_tolerance' => $max_tolerances[$a],
                    ]);
                } else {
                    $setting_tolerance = SettingToleranceAlert::create([
                        'subinstance_id' => $subinstance->id,
                        'type_device' => $type_devices[$a],
                        'field_data' => $field_datas[$a],
                        'min_tolerance' => $min_tolerances[$a],
                        'max_tolerance' => $max_tolerances[$a]
                    ]);
                }
            }


            Alert::toast('Subinstance successfully updated', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to update records', 'error');
        }

        return redirect()->route('instance.index');
    }

    public function destroy ($instanceId, $id)
    {
        try {
            Subinstance::where(['instance_id' => $instanceId, 'id' => $id])->delete();
            Alert::toast('Subinstance successfully deleted', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to delete records', 'error');
        }


        return redirect()->route('instance.index');
    }


}
