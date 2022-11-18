<?php

namespace App\Http\Controllers\Admin;

use App\Models\Instance;
use App\Models\Bussiness;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Exception;

class InstanceController extends Controller
{
   public function __construct()
    {
        $this->middleware('permission:instance_show')->only('index');
        $this->middleware('permission:instance_create')->only('create', 'store');
        $this->middleware('permission:instance_update')->only('edit', 'update');
        $this->middleware('permission:instance_delete')->only('delete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Instance::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('province', function($row){
                    if ($row->province) {
                        return $row->province->first()->provinsi;
                    }

                    return '-';
                })
                ->addColumn('city', function($row) {
                    if ($row->city) {
                        return $row->city->first()->kabupaten_kota;
                    }

                    return '-';
                })
                ->addColumn('district', function($row) {
                    if ($row->district) {
                        return $row->district->first()->kecamatan;
                    }

                    return '-';
                })
                ->addColumn('village', function($row) {
                    if ($row->village) {
                        return $row->village->first()->kelurahan;
                    }

                    return '-';
                })
                ->addColumn('bussiness', function($row) {
                    if ($row->bussiness) {
                        return $row->bussiness->first()->bussiness_name;
                    }
                })
                ->addColumn('action', 'admin.instance._action')
                ->toJson();
        }
        return view('admin.instance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bussinesses = Bussiness::all();
        $province = Province::all();

        return view('admin.instance', compact('bussiness', 'province'));
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
                'instance_code' => 'required|string|unique:instances,instance_code',
                'instance_name' => 'required|string',
                'address1' => 'required|string',
                'address2' => 'required|string',
                'province_id' => 'required|numeric|exists:tbl_provinsi,id',
                'city_id' => 'required|numeric|exists:tbl_kabkot, id',
                'district_id' => 'required|numeric|exists:tbl_kecamatan,id',
                'village_id' => 'required|numeric|exists:tbl_kelurahan,id',
                'zip_code' => 'required|string|exists:tbl_kelurahan,zip_code',
                'email' => 'required|string|email|unique:instances,email',
                'phone' => 'required|string|regex:/[0-9]+/im|unique:instances,phone',
                'bussiness_id' => 'required|numeric|exists:bussinesses,id',
                'username' => 'required|string|unique:instances,username',
                'password' => [
                    'required', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                ],
                'longitude' => 'required|string',
                'latitude' => 'required|string',

            ]
        );

        if ($validator->fails()) {
            Alert::toast('Data failed to save. '.$validator->errors()->first(), 'error');
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $data = $request->except(['_token']);
            $data['password'] = Hash::make($data['password']);

            $instances = Instance::create($data);

            if ($instances) {
                Alert::toast('Data success saved', 'success');
                return redirect()->route('instances.index');
            } else {
                Alert::toast('Data failed to save', 'error');
                return redirect()->route('instances.index');
            }
        } catch (Exception $e) {
            Alert::toast('Data failed to save', 'error');
            return redirect()->route('instances.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function show(Instance $instance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instance = Instance::findOrFail($id);
        $provinces = Province::all();
        $bussinesses = Bussiness::all();

        return view('admin.instance.edit', compact('instance', 'provinces', 'bussinesses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'instance_code' => 'required|string|unique:instances,instance_code',
                'instance_name' => 'required|string',
                'address1' => 'required|string',
                'address2' => 'required|string',
                'province_id' => 'required|numeric|exists:tbl_provinsi,id',
                'city_id' => 'required|numeric|exists:tbl_kabkot, id',
                'district_id' => 'required|numeric|exists:tbl_kecamatan,id',
                'village_id' => 'required|numeric|exists:tbl_kelurahan,id',
                'zip_code' => 'required|string|exists:tbl_kelurahan,zip_code',
                'email' => 'required|string|email|unique:instances,email',
                'phone' => 'required|string|regex:/[0-9]+/im|unique:instances,phone',
                'bussiness_id' => 'required|numeric|exists:bussinesses,id',
                'username' => 'required|string|unique:instances,username',
                'password' => [
                    'required', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                ],
                'longitude' => 'required|string',
                'latitude' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Data failed to save. '.$validator->errors()->first(), 'error');
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $instance = Instance::findOrFail($id);

        DB::beginTransaction();

        try {
            $data = $request->except('_token');

            if ( isset($data['password']) || $request->has('password')) {
                $data['password'] = Hash::make($data['password']);
            }

            $instance->update($data);

            Alert::toast('Data successfully updated', 'success');
            return redirect()->route('instance.index');
        } catch (Exception $e) {
            DB::rollback();
            Alert::toast('Data failed to save.', 'error');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instance = Instance::findOrFail($id);

        if ($instance->delete()) {
            Alert::toast('Data deleted successfully', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Data Failed to delete', 'error');
            return redirect()->back();
        }
    }
}