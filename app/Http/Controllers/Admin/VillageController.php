<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Village;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class VillageController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $query = Village::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'admin.village._action')
                ->toJson();
        }

        return view('admin.village.index');
    }

    public function create()
    {

        return view('admin.village.create', [
            'kecamatan' => District::all()
        ]);
    }

    public function store()
    {
        $attr = request()->validate([
            'kecamatan_id' => 'required',
            'kelurahan' => 'required',
            'kd_pos' => 'required'
        ]);

        try {
            Alert::toast('Data created', 'success');
            Village::create($attr);
            return redirect()->route('village.index');
        } catch (Exception $err) {
            return $err;
            Alert::toast('Data failed to create', 'error');
            return back();
        }
    }

    public function edit($id)
    {

        return view('admin.village.edit', [
            'village' => Village::whereId($id)->firstOrFail(),
            'kecamatan' => District::all()
        ]);
    }

    public function update($id)
    {
        $attr = request()->validate([
            'kecamatan_id' => 'required',
            'kelurahan' => 'required',
            'kd_pos' => 'required'
        ]);

        $village = Village::findOrFail($id);

        try {
            Alert::toast('Data updated', 'success');
            $village->update($attr);
            return redirect()->route('village.index');
        } catch (Exception $err) {
            Alert::toast('Data failed to update', 'error');
            return back();
        }
    }

    

    public function destroy($id)
    {

        $village = Village::findOrFail($id);
        try {
            if ($village->delete()) {
                Alert::toast('Data deleted successfully', 'success');
                return redirect()->route('village.index');
            } else {
                Alert::toast('Data failed to delete', 'error');
                return redirect()->route('village.index');
            }
        } catch (Exception $e) {
            Alert::toast('Data failed to delete, already related', 'error');
            return redirect()->back();
        }
    }
}
