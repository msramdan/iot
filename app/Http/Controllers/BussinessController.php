<?php

namespace App\Http\Controllers;

use App\Models\Bussiness;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class BussinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bussiness_show')->only('index');
        $this->middleware('permission:bussiness_create')->only('create', 'store');
        $this->middleware('permission:bussiness_update')->only('edit', 'update');
        $this->middleware('permission:bussiness_delete')->only('delete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Bussiness::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'admin.bussiness._action')
                ->toJson();
        }
        return view('admin.bussiness.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bussiness.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'bussiness_code' => 'required|string|max:50|unique:bussinesses,bussiness_code',
                'bussiness_name' => 'required|string|max:100',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $bussiness = Bussiness::create([
            'bussiness_code' => $request->bussiness_code,
            'bussiness_name' => $request->bussiness_name
        ]);

         if ($bussiness) {
            Alert::toast('Data saved successfully', 'success');
            return redirect()->route('bussiness.index');
        } else {
            Alert::toast('Data failed to save', 'error');
            return redirect()->route('bussiness.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function show(Bussiness $bussiness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bussiness = Bussiness::findOrFail($id);
        return view('admin.bussiness.edit', compact('bussiness'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'bussiness_code' => 'required|string|max:50|unique:bussinesses,bussiness_code,' . $id,
                'bussiness_name' => 'required|string|max:100',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();

        try {
            $bank = Bussiness::findOrFail($id);
            $bank->update([
                'bussiness_code' => $request->bussiness_code,
                'bussiness_name' => $request->bussiness_name,
            ]);

            if ($bank) {
                Alert::toast('Data berhasil diupdate', 'success');
                return redirect()->route('bussiness.index');
            }

        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Data gagal diupdate', 'error');
            return redirect()->route('bussiness.index');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bussiness = Bussiness::findOrFail($id);

        try {
            if ($bussiness->delete()) {
                Alert::toast('Data deleted successfully', 'success');
                return redirect()->route('bussiness.index');
            } else {
                Alert::toast('Data failed to delete', 'error');
                return redirect()->route('bussiness.index');
            }
        } catch(Exception $e) {
            Alert::toast('Data failed to delete, already related', 'error');
            return redirect()->back();
        }
    }
}
