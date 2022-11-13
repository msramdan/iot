<?php

namespace App\Http\Controllers\Admin;

use App\Models\MerchantApprove;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\ApprovalLogMerchant;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;
use App\Http\Controllers\Controller;

class MerchantApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Merchant::with([
                'merchant_category',
                'bank:id,bank_name',
                'rek_pooling',
                'bussiness',
            ])
                ->where('is_active', 0)
                ->whereIn('approved1',['need_approved', 'rejected', 'approved'])
                ->where('approved2', 'need_approved')
                ->orderBy('id', 'desc')
                ->get();
           return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('mid', function ($row) {
                    return $row->mid ? $row->mid : '-';
                })
                ->addColumn('merchant_category', function ($row) {
                    if ($row->merchant_category) {
                        $merchant_category = $row->merchant_category->first()->merchants_category_name;
                    } else {
                        $merchant_category = '-';
                    }

                    return $merchant_category;
                })
                ->addColumn('created_at', function ($row) {
                    if ($row->created_at) {
                        $created_at = date('d F Y H:i:s', strtotime($row->created_at));
                    } else {
                        $created_at = '-';
                    }

                    return $created_at;
                })
                ->addColumn('city', function($row) {
                    return $row->city ? $row->city->kabupaten_kota : '-';
                })
                ->addColumn('bussiness', function ($row) {
                    if ($row->bussiness) {
                        $bussiness = $row->bussiness->first()->bussiness_name;
                    } else {
                        $bussiness = '-';
                    }

                    return $bussiness;
                })
                ->addColumn('action', 'admin.merchant._action')
                ->toJson();
        }
        return view('admin.merchant.need_approved');
    }

    public function approve(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'approval' => 'required|string',
                'merchant_id' => 'required|numeric',
                'status' => 'required|string|in:approved,rejected,'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->error()->first()], 422);
        }

        $text_status = '';

        if ($request->status == 'approved') {
            $text_status = 'approve';
        } elseif ($request->status == 'rejected') {
            $text_status = 'rejected';
        }

        DB::beginTransaction();
        try {
            $merchant = Merchant::where('id', $request->merchant_id)->first();

            $ref_approval1 = ApprovalLogMerchant::where('merchant_id', $merchant->id)->where('step', 'approved1')->orderBy('id', 'desc')->first();

            $ref_approval2 = ApprovalLogMerchant::where('merchant_id', $merchant->id)->where('step', 'approved2')->orderBy('id', 'desc')->first();

            if (!$merchant) {
                return response()->json(['success' => false, 'message' => 'Merchant not found'], 500);
            }

            if ($request->approval == 'approved2' && $merchant->approved1 == 'need_approved') {
                return response()->json(['success' => false, 'message' => 'Failed to Approved 2, please approve approved 1'], 500);
            }

            if ($request->approval == 'approved1') {
                $merchant->update([
                    'approved1' => $request->status,
                ]);
            } elseif($request->approval == 'approved2') {
                $merchant->update([
                    'mid' => 'MRC'.Str::random(10),
                    'is_active' => 1,
                    'approved2' => $request->status,
                ]);
            }

            if ($request->status == 'rejected' && $merchant->is_active == 1) {
                $merchant->update([
                    'is_active' => 0
                ]);
            }

            $ref_approval1->update([
                'status' => $request->status
            ]);

            $ref_approval2->update([
                'status' => $request->status
            ]);


            return response()->json(['success' => true, 'message' => 'Success to '.$text_status.' merchant']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        } finally {
            DB::commit();
        }
    }
}