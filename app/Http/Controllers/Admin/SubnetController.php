<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subnet;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class SubnetController extends Controller
{
    public function index () 
    {
        if(request()->ajax()){
            return DataTables::of(Subnet::query())
                ->addIndexColumn()
                ->addColumn('action', 'admin.subnet._action')
                ->toJson();
        }

        return view('admin.subnet.index');
    }

    public function create ()
    {
        return view('admin.subnet.create');
    }

    public function store ()
    {
        $attr = request()->validate([
            'subnet' => 'required'
        ]);

        try {
            Subnet::create($attr);
            Alert::toast('Subnet successfully created', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to save records', 'error');
        }

        return redirect()->route('subnet.index');
    }

    public function edit (Subnet $subnet)
    {
        return view('admin.subnet.edit', compact('subnet'));
    }

    public function update (Subnet $subnet)
    {
        $attr = request()->validate([
            'subnet' => 'required'
        ]);

        try {
            $subnet->update($attr);
            Alert::toast('Subnet successfully update', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to update records', 'error');
        }

        return redirect()->route('subnet.index');
    }

    public function destroy (Subnet $subnet)
    {
        try {
            $subnet->delete();
            Alert::toast('Subnet successfully delete', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to delete records', 'error');
        }

        return redirect()->route('subnet.index');
    }

}
