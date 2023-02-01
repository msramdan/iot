<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billingdata;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;

class BillingdataController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Billingdata::query())
                ->addIndexColumn()
                ->addColumn('action', 'admin.billing._action')
                ->toJson();
        }
        return view('admin.billing.index');
    }

    public function create()
    {
        $id = IdGenerator::generate(['table' => 'invoices', 'field' => 'invoice_number', 'length' => 16, 'prefix' => 'INV-' . date('Ymd')]);

        return view('admin.billing.create', compact('id'));
    }
}
