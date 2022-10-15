<?php

namespace App\Http\Controllers;

use App\Models\MdrLog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Throwable;

class MdrLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = MdrLog::with([
                'merchant',
            ])
                ->orderBy('id', 'desc')
                ->get();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('merchant', function ($row) {
                    return $row->merchant->merchant_name;
                })
                ->addColumn('value_mdr', function ($row) {
                    return $row->value_mdr . '%';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })
                ->addColumn('time', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->addColumn('action', 'merchant._action')
                ->toJson();
        }
        return view('mdr_log.index');
    }

    public function getDetailMdr($id)
    {
        $data = DB::table('mdr_logs')
            ->select('mdr_logs.*')
            ->where('merchant_id', $id)
            ->get();
        $output = '';
        $output .= '<table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Value Mdr</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($data as $row) {
            $output .= '<tr>
            <td>' . $row->value_mdr . ' %</td>
            <td>' . $row->created_at . '</td>
            <td>' .  Carbon::parse($row->created_at)->diffForHumans(). '</td>
        </tr>';
        }
        $output .= '</tbody>
        </table>';
        echo $output;
    }
}
