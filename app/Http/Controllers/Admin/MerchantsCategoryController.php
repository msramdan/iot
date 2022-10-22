<?php

namespace App\Http\Controllers\Admin;

use App\Models\MerchantsCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Http\Controllers\Controller;

class MerchantsCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:merchants_category_show')->only('index');
        $this->middleware('permission:merchants_category_create')->only('create', 'store');
        $this->middleware('permission:merchants_category_update')->only('edit', 'update');
        $this->middleware('permission:merchants_category_delete')->only('delete');
    }

    public function index()
    {
        if (request()->ajax()) {
            $query = MerchantsCategory::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'admin.merchants_category._action')
                ->toJson();
        }
        return view('admin.merchants_category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.merchants_category.create');
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
                'merchants_category_code' => "required|string|max:50|unique:merchants_category,merchants_category_code",
                'merchants_category_name' => "required|string|max:100|unique:merchants_category,merchants_category_name",
                'merchants_category_title' => 'required|string|max:100',
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $merchants_category = MerchantsCategory::create([
            'merchants_category_code' => $request->merchants_category_code,
            'merchants_category_name'   => $request->merchants_category_name,
            'merchants_category_title' => $request->merchants_category_title
        ]);
        if ($merchants_category) {
            Alert::toast('Data saved successfully', 'success');
            return redirect()->route('merchants_c.index');
        } else {
            Alert::toast('Data failed to save', 'error');
            return redirect()->route('merchants_c.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MerchantsCategory  $merchantsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MerchantsCategory $merchantsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MerchantsCategory  $merchantsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merchantsCategory = MerchantsCategory::findOrFail($id);
        return view('admin.merchants_category.edit',compact('merchantsCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MerchantsCategory  $merchantsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'merchants_category_code' => "required|string|max:50|unique:merchants_category,merchants_category_code," . $id,
                'merchants_category_name' => "required|string|max:200|unique:merchants_category,merchants_category_name," . $id,
                'merchants_category_title' => 'required|string|max:100',
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $merchantsCategory = MerchantsCategory::findOrFail($id);
            $merchantsCategory->update([
                'merchants_category_code' => $request->merchants_category_code,
                'merchants_category_name'   => $request->merchants_category_name,
                'merchants_category_title' => $request->merchants_category_title
            ]);
            if ($merchantsCategory) {
                Alert::toast('Data berhasil diupdate', 'success');
                return redirect()->route('merchants_c.index');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Data gagal diupdate', 'error');
            return redirect()->route('merchants_c.index');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MerchantsCategory  $merchantsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchantsCategory = MerchantsCategory::findOrFail($id);
        try {
            if ($merchantsCategory->delete()) {
                Alert::toast('Data deleted successfully', 'success');
                return redirect()->route('merchants_c.index');
            } else {
                Alert::toast('Data failed to delete', 'error');
                return redirect()->route('merchants_c.index');
            }
        } catch (Exception $e) {
            Alert::toast('Data failed to delete, already related', 'error');
            return redirect()->back();
        }
    }
}
