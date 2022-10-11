<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLogMerchant;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Throwable;

class ApprovalLogMerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = ApprovalLogMerchant::with([
                'merchant',
                'user'
            ])
            ->orderBy('id', 'desc')
            ->get();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('merchant', function($row) {
                    return $row->merchant->merchant_name;
                })
                ->addColumn('user', function($row) {
                    return $row->user->first()->name;
                })
                ->addColumn('status', function($row) {
                    if ($row->status == 'need_approved') {
                        $status = 'Need Approved';
                    } elseif ($row->status == 'approved') {
                        $status = 'Approved';
                    } elseif ($row->status == 'reject') {
                        $status = 'Reject';
                    } elseif ($row->status == 'non_active') {
                        $status = 'non_active';
                    }

                    return $status;
                })
                ->addColumn('step', function($row) {
                    if ($row->step == 'approved1') {
                        $step = 'Approved 1';
                    } elseif ($row->step == 'approved2') {
                        $step = 'Approved 2';
                    }

                    return $step;
                })
                ->addColumn('ref', function($row) {
                    return $row->ref;
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
        return view('approval_log_merchant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApprovalLogMerchant  $approvalLogMerchant
     * @return \Illuminate\Http\Response
     */
    public function show(ApprovalLogMerchant $approvalLogMerchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApprovalLogMerchant  $approvalLogMerchant
     * @return \Illuminate\Http\Response
     */
    public function edit(ApprovalLogMerchant $approvalLogMerchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ApprovalLogMerchant  $approvalLogMerchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApprovalLogMerchant $approvalLogMerchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApprovalLogMerchant  $approvalLogMerchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApprovalLogMerchant $approvalLogMerchant)
    {
        //
    }
}
