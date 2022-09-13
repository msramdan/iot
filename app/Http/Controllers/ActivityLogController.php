<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ActivityLogController extends Controller
{

    public function index()
    {

        if (request()->ajax()) {
            $query = ActivityLog::with('user')->orderBy('id','DESC')->get();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('causer', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })
                ->addColumn('time', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->toJson();
        }
        return view('activity_log.index');
    }


}
