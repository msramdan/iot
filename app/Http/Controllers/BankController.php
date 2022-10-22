<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bank_show')->only('index');
        $this->middleware('permission:bank_create')->only('create', 'store');
        $this->middleware('permission:bank_update')->only('edit', 'update');
        $this->middleware('permission:bank_delete')->only('delete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Bank::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'admin.bank._action')
                ->toJson();
        }
        return view('admin.bank.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bank.create');
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
                'bank_code' => 'required|string|max:50',
                'bank_name' => 'required|string|max:100',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $bank = Bank::create([
            'bank_code' => $request->bank_code,
            'bank_name' => $request->bank_name
        ]);

         if ($bank) {
            Alert::toast('Data saved successfully', 'success');
            return redirect()->route('bank.index');
        } else {
            Alert::toast('Data failed to save', 'error');
            return redirect()->route('bank.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        return view('admin.bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'bank_code' => 'required|string|max:50',
                'bank_name' => 'required|string|max:100',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();

        try {
            $bank = Bank::findOrFail($id);
            $bank->update([
                'bank_code' => $request->bank_code,
                'bank_name' => $request->bank_name,
            ]);

            if ($bank) {
                Alert::toast('Data berhasil diupdate', 'success');
                return redirect()->route('bank.index');
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
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);

        try {
            if ($bank->delete()) {
                Alert::toast('Data deleted successfully', 'success');
                return redirect()->route('bank.index');
            } else {
                Alert::toast('Data failed to delete', 'error');
                return redirect()->route('bank.index');
            }
        } catch(Exception $e) {
            Alert::toast('Data failed to delete, already related', 'error');
            return redirect()->back();
        }
    }
}
