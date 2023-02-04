<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billingdata;
use App\Models\Cluster;
use App\Models\Device;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;

class BillingdataController extends Controller
{
    public function index(Request $request)
    {
        $start_dates = Carbon::now()->firstOfMonth();
        $end_dates = Carbon::now()->endOfMonth();

        if (request()->ajax()) {
            $clusters = Cluster::select(
                'clusters.*',
                'instances.instance_name',
                'subinstances.name_subinstance'
            )
            ->join('instances', 'clusters.instance_id', '=', 'instances.id')
            ->join('subinstances', 'clusters.subinstance_id', 'subinstances.id')
            ->get();

            if ($request->has('date') && !empty($request->date)) {
                $dates = explode(' to ', $request->date);
                $start = str_replace(',', '', $dates[0]) . " 00:00:00";
                $end = str_replace(',', '', $dates[1]) . " 23:59:59";

                $start_dates = date('Y-m-d H:i:s', strtotime($start));
                $end_dates = date('Y-m-d H:i:s', strtotime($end));
            }

            foreach ($clusters as $i => $cluster) {
                $total_usage_cluster_water = 0;
                $total_usage_cluster_gas = 0;
                $total_usage_cluster_power = 0;

                /** Water Meter */
                $device_waters = Device::select(
                    DB::raw("SUM(daily_usage_devices.usage) as total_usage")
                )
                ->join('daily_usage_devices', 'devices.id', '=', 'daily_usage_devices.device_id')
                ->where('cluster_id', $cluster->id)
                ->where('category', 'Water Meter')
                ->whereBetween('daily_usage_devices.created_at', [$start_dates, $end_dates])
                ->get();

                foreach ($device_waters as $device_water) {
                    $total_usage_cluster_water += $device_water->total_usage;
                }
                /** End Water Meter */

                 /**Power Meter */
                 $device_powers = Device::select(
                    DB::raw("SUM(daily_usage_devices.usage) as total_usage")
                )
                ->join('daily_usage_devices', 'devices.id', '=', 'daily_usage_devices.device_id')
                ->where('cluster_id', $cluster->id)
                ->where('category', 'Power Meter')
                ->whereBetween('daily_usage_devices.created_at', [$start_dates, $end_dates])
                ->get();

                foreach ($device_powers as $device_power) {
                    $total_usage_cluster_power += $device_power->total_usage;
                }
                /** End Power Meter */

                 /** Gas Meter */
                 $device_gases = Device::select(
                    DB::raw("SUM(daily_usage_devices.usage) as total_usage")
                )
                ->join('daily_usage_devices', 'devices.id', '=', 'daily_usage_devices.device_id')
                ->where('cluster_id', $cluster->id)
                ->where('category', 'Gas Meter')
                ->whereBetween('daily_usage_devices.created_at', [$start_dates, $end_dates])
                ->get();

                foreach ($device_gases as $device_gas) {
                    $total_usage_cluster_gas += $device_gas->total_usage;
                }
                /** End Water Meter */

                $clusters[$i]->water_meter = $total_usage_cluster_water;
                $clusters[$i]->power_meter = $total_usage_cluster_power;
                $clusters[$i]->gas_meter = $total_usage_cluster_gas;
            }


            return DataTables::of($clusters)
                ->addIndexColumn()
                ->addColumn('instance', function($row) {
                    return $row->instance_name ?? '-';
                })
                ->addColumn('subinstance', function($row) {
                    return $row->name_subinstance ?? '-';
                })
                ->addColumn('cluster', function($row) {
                    return $row->name ?? '-';
                })
                ->addColumn('water_meter', function($row) {
                    return $row->water_meter ?? 0;
                })
                ->addColumn('power_meter', function($row) {
                    return $row->power_meter ?? 0;
                })
                ->addColumn('gas_meter', function($row) {
                    return $row->gas_meter ?? 0;
                })
                ->addColumn('action', 'admin.billing._action')
                ->toJson();
        }

        return view('admin.billing.index', compact('start_dates', 'end_dates'));
    }
}