<?php

namespace App\Http\Controllers;

use App\Models\RekPooling;
use App\Models\Bank;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Throwable;

class RekPoolingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:rek_pooling_show')->only('index');
        $this->middleware('permission:rek_pooling_create')->only('create', 'store');
        $this->middleware('permission:rek_pooling_update')->only('edit', 'update');
        $this->middleware('permission:rek_pooling_delete')->only('delete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = RekPooling::with('bank:id,bank_name');
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('bank', function($row) {
                    return $row->bank->first()->bank_name;
                })
                ->addColumn('action', 'admin.rek_pooling._action')
                ->toJson();
        }
        return view('admin.rek_pooling.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = Bank::all();
        return view('admin.rek_pooling.create', compact('bank'));
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
                'rek_pooling_code' => 'required|string|max:50|unique:rek_poolings,rek_pooling_code',
                'bank_id' => 'required|numeric|exists:banks,id',
                'account_name' => 'required|string|max:100',
                'number_account' => 'required|string|max:100|regex:/[0-9]+/im'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $rek_pooling = RekPooling::create([
            'rek_pooling_code' => $request->rek_pooling_code,
            'bank_id' => $request->bank_id,
            'account_name' => $request->account_name,
            'number_account' => $request->number_account,
        ]);

        if ($rek_pooling) {
            Alert::toast('Data saved successfully', 'success');
            return redirect()->route('rek_pooling.index');
        } else {
            Alert::toast('Data failed to save', 'error');
            return redirect()->route('rek_pooling.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekPooling  $rekPooling
     * @return \Illuminate\Http\Response
     */
    public function show(RekPooling $rekPooling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekPooling  $rekPooling
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rek_pooling = RekPooling::findOrFail($id);
        $bank = Bank::all();
        return view('admin.rek_pooling.edit', compact('rek_pooling', 'bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekPooling  $rekPooling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'rek_pooling_code' => 'required|string|max:50|unique:rek_poolings,rek_pooling_code,' . $id,
                'bank_id' => 'required|numeric|exists:banks,id',
                'account_name' => 'required|string|max:100',
                'number_account' => 'required|string|max:100|regex:/[0-9]+/im'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();

        try {
            $rek_pooling = RekPooling::findOrfail($id);
            $rek_pooling->update([
                'rek_pooling_code' => $request->rek_pooling_code,
                'bank_id' => $request->bank_id,
                'account_name' => $request->account_name,
                'number_account' => $request->number_account,
            ]);

            if ($rek_pooling) {
                Alert::toast('Data Updated Successfully', 'success');
                return redirect()->route('rek_pooling.index');
            } else {
                Alert::toast('Data Updated Failed', 'failed');
                return redirect()->route('rek_pooling.index');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Data gagal diupdate', 'error');
            return redirect()->route('bank.index');
        } finally {
            DB::commit();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekPooling  $rekPooling
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rek_pooling = RekPooling::findOrFail($id);

        try {
            if ($rek_pooling->delete()) {
                Alert::toast('Data deleted successfully', 'success');
                return redirect()->route('rek_pooling.index');
            } else {
                Alert::toast('Data deleted successfully', 'success');
                return redirect()->route('rek_pooling.index');
            }
        } catch(Exception $e) {
            Alert::toast('Data failed to delete, already related', 'error');
            return redirect()->back();
        }
    }
}
