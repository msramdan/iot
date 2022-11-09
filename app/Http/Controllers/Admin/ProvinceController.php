<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ProvinceController extends Controller
{
    public function index ()
    {
        if (request()->ajax()) {

                $query = Province::query();
                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('action', 'admin.province._action')
                    ->toJson();
        }

        return view('admin.province.index');
    }

    public function create()
    {
        return view('admin.province.create');
    }

    public function store ()
    {
        $attr = request()->validate([
            'provinsi' => 'required',
            'ibukota' => 'required'
        ]);

        try{
            Alert::toast('Data created', 'success');
            Province::create($attr);
            return redirect()->route('province.index');
        }catch(Exception $err){
            Alert::toast('Data failed to create', 'error');
            return back();
        }
    }

    public function edit ($id)
    {

        return view('admin.province.edit', [
            'province' => Province::whereId($id)->firstOrFail()
        ]);
    }

    public function update ($id)
    {
        $attr = request()->validate([
            'provinsi' => 'required',
            'ibukota' => 'required'
        ]);

        $province = Province::findOrFail($id);
        
        try {
            Alert::toast('Data updated', 'success');
            $province->update($attr);
            return redirect()->route('province.index');
        } catch (Exception $err) {
            Alert::toast('Data failed to update', 'error');
            return back();
        }
    }

    public function destroy($id)
    {
        $province = Province::findOrFail($id);
        try {
            if ($province->delete()) {
                Alert::toast('Data deleted successfully', 'success');
                return redirect()->route('province.index');
            } else {
                Alert::toast('Data failed to delete', 'error');
                return redirect()->route('province.index');
            }
        } catch (Exception $e) {
            Alert::toast('Data failed to delete, already related', 'error');
            return redirect()->back();
        }
    }
}
