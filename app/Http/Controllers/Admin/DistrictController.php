<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class DistrictController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $query = District::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'admin.district._action')
                ->toJson();
        }

        return view('admin.district.index');
    }

    public function create()
    {
    
        return view('admin.district.create', [
            'kabkot' => City::all()
        ]);
    }

    public function store()
    {
        $attr = request()->validate([
            'kabkot_id' => 'required',
            'kecamatan' => 'required',
        ]);

        try {
            Alert::toast('Data created', 'success');
            District::create($attr);
            return redirect()->route('district.index');
        } catch (Exception $err) {
            return $err;
            Alert::toast('Data failed to create', 'error');
            return back();
        }
    }

    public function edit($id)
    {

        return view('admin.district.edit', [
            'district' => District::whereId($id)->firstOrFail(),
            'kabkot' => City::all()
        ]);
    }

    public function update($id)
    {
        $attr = request()->validate([
            'kabkot_id' => 'required',
            'kecamatan' => 'required',
        ]);

        $district = District::findOrFail($id);

        try {
            Alert::toast('Data updated', 'success');
            $district->update($attr);
            return redirect()->route('district.index');
        } catch (Exception $err) {
            Alert::toast('Data failed to update', 'error');
            return back();
        }
    }

    public function destroy($id)
    {

        $district = District::findOrFail($id);
        try {
            if ($district->delete()) {
                Alert::toast('Data deleted successfully', 'success');
                return redirect()->route('district.index');
            } else {
                Alert::toast('Data failed to delete', 'error');
                return redirect()->route('district.index');
            }
        } catch (Exception $e) {
            Alert::toast('Data failed to delete, already related', 'error');
            return redirect()->back();
        }
    }
}
