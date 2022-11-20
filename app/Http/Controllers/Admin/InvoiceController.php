<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceController extends Controller
{
    public function index ()
    {
        if(request()->ajax()){
            return DataTables::of(Invoice::query())
                ->addIndexColumn()
                ->addColumn('action', 'admin.invoice._action')
                ->toJson();
        }
        return view('admin.invoice.index');
    }

    public function create ()
    {
        $id = IdGenerator::generate(['table' => 'invoices', 'field' => 'invoice_number', 'length' => 16, 'prefix' => 'INV-' . date('Ymd')]);

        return view('admin.invoice.create', compact('id'));
    }

    public function store ()
    {
        $attr = request()->validate([
            'invoice_number' => 'required',
            'description' => 'required',
            'grand_total' => 'required',
            'period' => 'required',
            'status' => 'required',
        ]);
        
        try {
            Invoice::create($attr);
            Alert::toast('Invoice successfully created', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to save records', 'error');
        }

        return redirect()->route('invoice.index');
    }

    public function edit (Invoice $invoice)
    {
        return view('admin.invoice.edit', compact('invoice'));
    }

    public function update (Invoice $invoice)
    {
        $attr = request()->validate([
            'description' => 'required',
            'grand_total' => 'required',
            'period' => 'required',
            'status' => 'required',
        ]);
        
        try {
            $invoice->update($attr);
            Alert::toast('Invoice successfully created', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to save records', 'error');
        }

        return redirect()->route('invoice.index');
    }

    public function destroy(Invoice $invoice)
    {
        try {
            $invoice->delete();
            Alert::toast('Invoice successfully deleted', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to delete records', 'error');
        }

        return redirect()->route('invoice.index');
    }
}
