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
            $query = ActivityLog::with('user')->orderBy('id', 'DESC')->get();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('causer', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('new_value', function ($row) {
                    $array =  json_decode($row->properties);
                    $items = array();
                    foreach ($array as $key => $value) {
                        if ($key == 'attributes') {
                            foreach ($value as $r => $b) {
                                $items[$r] = $b;
                            }
                        }
                    }
                    $hasil =  json_encode(($items), JSON_PRETTY_PRINT);
                    return '<pre>' . $hasil . '</pre>';
                })
                ->addColumn('old_value', function ($row) {
                    $array =  json_decode($row->properties);
                    $items = array();
                    foreach ($array as $key => $value) {
                        if ($key == 'old') {
                            foreach ($value as $r => $b) {
                                $items[$r] = $b;
                            }
                        }
                    }
                    $hasil =  json_encode(($items), JSON_PRETTY_PRINT);
                    return '<pre>' . $hasil . '</pre>';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })
                ->addColumn('time', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->rawColumns(['new_value', 'old_value'])
                ->make(true);
            // ->toJson();
        }
        return view('admin.activity_log.index');
    }
}
