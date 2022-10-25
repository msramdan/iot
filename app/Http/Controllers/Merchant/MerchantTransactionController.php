<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class MerchantTransactionController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Transaction::with([
                'merchant',
            ])->where('merchant_id', auth()->guard('merchant')->user()->id)
                ->orderBy('id', 'desc')
                ->get();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('merchant_name', function($row){
                    return $row->merchant->first()->merchant_name;
                })
                ->toJson();
        }

        return view('merchant.transaction.index');
    }
}
