<?php

namespace App\Http\Controllers\Admin;

use App\Models\MerchantApprove;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\MerchantsCategory;
use App\Models\Kabkot;
use App\Models\ApprovalLogMerchant;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MerchantRejectController extends Controller
{
    public function reject(Request $request)
    {
        $merchant_categories = MerchantsCategory::all();
        $cities = Kabkot::all();

        if (request()->ajax()) {
            $merchant = Merchant::with([
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
                });

               if ($request->has('date') && !empty($request->date)) {
                    $dates = explode(' to ', $request->date);
                    $start = str_replace(',', '', $dates[0])." 00:00:00";
                    $end = str_replace(',', '', $dates[1])." 23:59:59";

                    $start_dates = date('Y-m-d H:i:s', strtotime($start));
                    $end_dates = date('Y-m-d H:i:s', strtotime($end));

                    $merchant = $merchant->whereBetween('created_at', [$start_dates, $end_dates]);
                }

                if ($request->has('city') && !empty($request->city)) {
                    $merchant = $merchant->where('kabkot_id', $request->city);
                }

                if ($request->has('merchant_category') && !empty($request->merchant_category)) {
                    $merchant = $merchant->where('merchant_category_id', $request->merchant_category);
                }

                $merchant = $merchant->orderBy('id', 'desc')->get();

            return DataTables::of($merchant)
                ->addIndexColumn()
                ->addColumn('merchant_category', function ($row) {
                    return $row->merchant_category->first()->merchants_category_name;
                })
                ->addColumn('bussiness', function ($row) {
                    return $row->bussiness->first()->bussiness_name;
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
                ->addColumn('action', 'admin.merchant._action')
                ->toJson();
        }
        return view('admin.merchant.rejected', compact('merchant_categories', 'cities'));
    }

}
