<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MerchantExport implements FromView
{
    public $merchants;

    public function __construct($merchants)
    {
        $this->merchants = $merchants;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $merchants = $this->merchants;

        return view('merchant.excel', compact('merchants'));
    }
}
