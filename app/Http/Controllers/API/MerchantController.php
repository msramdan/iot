<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function transactions($merchant_id)
    {
        return response()->json([
            'message' => 'Berhasil mengambil data transaksi',
            'data' => [
                'transactions' => Transaction::where('merchant_id', $merchant_id)->get()
            ]
        ]);
    }
}
