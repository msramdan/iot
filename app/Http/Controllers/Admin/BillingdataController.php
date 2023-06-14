<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billingdata;
use App\Models\Cluster;
use App\Models\DailyUsageDevice;
use App\Models\Device;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;

class BillingdataController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:billing_show')->only('index');
    }

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
                $total_billing_water = 0;
                $total_billing_power = 0;
                $total_billing_gas = 0;

                $devices = Device::where('devices.cluster_id', $cluster->id)->get();

                foreach ($devices as $device) {
                    $total_usage = DailyUsageDevice::where('device_id', $device->id)
                        ->whereBetween('created_at', [$start_dates, $end_dates])
                        ->sum('usage');

                    switch (Str::slug($device->category)) {
                        case 'water-meter':
                            $total_usage_cluster_water += $total_usage;
                            $total_billing_water += $total_usage * $cluster->xpercentage_water + $cluster->yfixed_cost_water;
                            break;
                        case 'power-meter':
                            $total_usage_cluster_power += $total_usage;
                            $total_billing_power += $total_usage * $cluster->xpercentage_power + $cluster->yfixed_cost_power;
                            break;
                        case 'gas-meter':
                            $total_usage_cluster_gas += $total_usage;
                            $total_billing_gas += $total_usage * $cluster->xpercentage_gas + $cluster->yfixed_cost_gas;
                            break;
                        default:
                            break;
                    }
                }

                $clusters[$i]->billing_water =  $total_billing_water;
                $clusters[$i]->billing_power =  $total_billing_power;
                $clusters[$i]->billing_gas =  $total_billing_gas;
                $clusters[$i]->water_meter = $total_usage_cluster_water;
                $clusters[$i]->power_meter = $total_usage_cluster_power;
                $clusters[$i]->gas_meter = $total_usage_cluster_gas;
            }


            return DataTables::of($clusters)
                ->addIndexColumn()
                ->addColumn('instance', function ($row) {
                    return $row->instance_name ?? '-';
                })
                ->addColumn('subinstance', function ($row) {
                    return $row->name_subinstance ?? '-';
                })
                ->addColumn('cluster', function ($row) {
                    return $row->name ?? '-';
                })
                // ->addColumn('water_meter', function ($row) {
                //     return $row->water_meter ?? 0;
                // })
                ->addColumn('billing_water', function ($row) {
                    return 'Rp. ' . number_format($row->billing_water, 2, '.', '.');
                })
                // ->addColumn('power_meter', function ($row) {
                //     return $row->power_meter ?? 0;
                // })
                ->addColumn('billing_power', function ($row) {
                    return 'Rp. ' . number_format($row->billing_power, 2, '.', '.');
                })
                // ->addColumn('gas_meter', function ($row) {
                //     return $row->gas_meter ?? 0;
                // })
                ->addColumn('billing_gas', function ($row) {
                    return 'Rp. ' .  number_format($row->billing_gas, 2, '.', '.');
                })
                ->addColumn('action', 'admin.billing._action')
                ->toJson();
        }

        return view('admin.billing.index', compact('start_dates', 'end_dates'));
    }

    public function detail(Request $request, $id)
    {
        $start_dates = Carbon::now()->firstOfMonth();
        $end_dates = Carbon::now()->endOfMonth();

        $cluster = Cluster::select(
            'clusters.*',
            'instances.instance_name',
            'subinstances.name_subinstance'
        )
            ->join('instances', 'clusters.instance_id', '=', 'instances.id')
            ->join('subinstances', 'clusters.subinstance_id', 'subinstances.id')
            ->where('clusters.id', $id)
            ->first();

        $total_amount_bill = 0;
        $date = $request->date ?? null;

        if (!empty($date)) {
            $dates = explode(' to ', $request->date);
            $start = str_replace(',', '', $dates[0]) . " 00:00:00";
            $end = str_replace(',', '', $dates[1]) . " 23:59:59";

            $start_dates = date('Y-m-d H:i:s', strtotime($start));
            $end_dates = date('Y-m-d H:i:s', strtotime($end));
        }

        $devices = Device::where('devices.cluster_id', $cluster->id)->get();

        foreach ($devices as $i => $device) {
            $total_usage = DailyUsageDevice::where('device_id', $device->id)
                ->whereBetween('created_at', [$start_dates, $end_dates])
                ->sum('usage');

            switch (Str::slug($device->category)) {
                case 'water-meter':
                    $total_billing = $total_usage * $cluster->xpercentage_water + $cluster->yfixed_cost_water;
                    break;
                case 'power-meter':
                    $total_billing = $total_usage * $cluster->xpercentage_power + $cluster->yfixed_cost_power;
                    break;
                case 'gas-meter':
                    $total_billing = $total_usage * $cluster->xpercentage_gas + $cluster->yfixed_cost_gas;
                    break;
                default:
                    $total_billing = 0;
                    break;
            }

            $total_amount_bill += $total_billing;

            $devices[$i]->total_usage = $total_usage;
            $devices[$i]->total_billing = $total_billing;
        }


        return view('admin.billing.detail', compact('date', 'start_dates', 'end_dates', 'cluster', 'devices', 'total_amount_bill'));
    }
}
