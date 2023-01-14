<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subinstance;
use App\Models\Instance;
use Yajra\DataTables\Facades\DataTables;

class SubInstanceController extends Controller
{
    public function index()
    {

        $instance = Instance::where('id', auth()->guard('instances')->user()->id)->first();
        if (request()->ajax()) {
            $query = Subinstance::with(['cluster' => function($q) {
                $q->with('device');
            }])
                ->where('instance_id', $instance->id)->get();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'partner.subinstance._action')
                ->toJson();
        }
        return view('partner.subinstance.index');
    }
}
