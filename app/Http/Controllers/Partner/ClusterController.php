<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Cluster;
use App\Models\Subinstance;
use Illuminate\Http\Request;

class ClusterController extends Controller
{
    public function index ($subinstanceId)
    {

        $clusterCallback = function($query){
            $query->when(request()->filled('keyword'), function($q){
                $q->where('name', 'like', '%' . request('keyword') .'%');
            });
        };

        $subinstance = Subinstance::with(['cluster' => $clusterCallback])->firstOrFail();

        return view('partner.cluster.index', compact('subinstance'));
    }
}
