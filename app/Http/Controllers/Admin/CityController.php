<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $query = City::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'admin.city._action')
                ->toJson();
        }

        return view('admin.city.index');
    }

    public function create()
    {
        return view('admin.city.create', [
            'provinsi' => Province::all()
        ]);
    }

    public function store()
    {
        $attr = request()->validate([
            'provinsi_id' => 'required',
            'kabupaten_kota' => 'required',
            'ibukota' => 'required'
        ]);

        try {
            Alert::toast('Data created', 'success');
            City::create($attr);
            return redirect()->route('city.index');
        } catch (Exception $err) {
            Alert::toast('Data failed to create', 'error');
            return back();
        }
    }

    public function edit($id)
    {

        return view('admin.city.edit', [
            'city' => City::whereId($id)->firstOrFail(),
            'provinsi' => Province::all()
        ]);
    }

    public function update($id)
    {
        $attr = request()->validate([
            'provinsi_id' => 'required',
            'kabupaten_kota' => 'required',
            'ibukota' => 'required'
        ]);

        $city = City::findOrFail($id);

        try {
            Alert::toast('Data updated', 'success');
            $city->update($attr);
            return redirect()->route('city.index');
        } catch (Exception $err) {
            Alert::toast('Data failed to update', 'error');
            return back();
        }
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        
        try {
            if ($city->delete()) {
                Alert::toast('Data deleted successfully', 'success');
                return redirect()->route('city.index');
            } else {
                Alert::toast('Data failed to delete', 'error');
                return redirect()->route('city.index');
            }
        } catch (Exception $e) {
            Alert::toast('Data failed to delete, already related', 'error');
            return redirect()->back();
        }
    }
}
