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
use App\Http\Controllers\Controller;

class MerchantRejectController extends Controller
{
    public function reject()
    {
        if (request()->ajax()) {
            $query = Merchant::with([
                'merchant_category',
                'bank:id,bank_name',
                'rek_pooling',
                'bussiness',
            ])
                ->where('is_active', 0)
                ->where(function ($q) {
                    $q->where('approved1', 'approved')
                        ->orwhere('approved1', 'rejected');
                })->where(function ($q) {
                    $q->where('approved2', 'approved')
                        ->orwhere('approved2', 'rejected');
                })
                ->orderBy('id', 'desc')
                ->get();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('merchant_category', function ($row) {
                    return $row->merchant_category->first()->merchants_category_name;
                })
                ->addColumn('bussiness', function ($row) {
                    return $row->bussiness->first()->bussiness_name;
                })
                ->addColumn('bank', function ($row) {
                    return $row->bank->first()->bank_name;
                })
                ->addColumn('rek_pooling', function ($row) {
                    return $row->rek_pooling->first()->rek_pooling_code;
                })
                ->addColumn('action', 'admin.merchant._action')
                ->toJson();
        }
        return view('admin.merchant.rejected');
    }

}