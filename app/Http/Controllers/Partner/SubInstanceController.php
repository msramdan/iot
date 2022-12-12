<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subinstance;
use App\Models\SettingApp;
use App\Models\Device;
use App\Models\Cluster;
use App\Models\Instance;

class SubInstanceController extends Controller
{
    public function index()
    {
        $instance = Instance::where('id', auth()->guard('instances')->user()->id)->first();
        $subinstance = Subinstance::where('instance_id', $instance->id)->get();
        $cluster = Cluster::where('instance_id', $instance->id)->get();
        $device = Device::where('appID', $instance->appID)->get();
        return view('partner.subinstance.index', compact('instance', 'subinstance', 'cluster', 'device'));
    }

    public function cluster(){
        return "cluster";
    }
}
