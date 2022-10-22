<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;

class MerchantProfileController extends Controller
{
    public function index() {
        $merchant = Merchant::with([
            'bussiness',
            'merchant_approve',
            'bank',
            'merchant_category',
            'approval_log',
            'mdr_log',
        ])->findOrFail(auth()->guard('merchant')->user()->id);

        return view('merchant.profile', compact('merchant'));
    }
}
