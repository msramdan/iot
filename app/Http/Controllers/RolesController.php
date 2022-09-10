<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role_show')->only('index');
        $this->middleware('permission:role_create')->only('create', 'store');
        $this->middleware('permission:role_update')->only('edit', 'update');
        $this->middleware('permission:role_delete')->only('delete');
    }

    public function index()
    {
        if (request()->ajax()) {
            $query = Role::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'roles._action')
                ->toJson();
        }
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|string|max:50|unique:roles,name",
                'permissions' => "required"
            ],
            [],
            $this->attribute()
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            // add role
            $role = Role::create(['name' => $request->name]);
            // kemudian kasih akses permission
            $role->givePermissionTo($request->permissions);
            Alert::toast('Data saved successfully', 'success');
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
            Alert::toast('Data failed to save', 'error');
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    public function edit(Role $role)
    {
        $data = $role->permissions()->pluck('name')->toArray();
        return view('roles.edit', [
            'role' => $role,
            'permissionChecked' => $data
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|string|max:50|unique:roles,name," . $role->id,
                'permissions' => "required"
            ],
            [],
            $this->attribute()
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
            // add role
            $role->name = $request->name;
            // kemudian kasih akses permission
            $role->syncPermissions($request->permissions);
            $role->save();
            Alert::toast('Data updated successfully', 'success');
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
            Alert::toast('Data failed to update', 'error');
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    public function destroy(Role $role)
    {

        if (User::role($role->name)->count()) {
            Alert::toast('Data failed to delete, data is related', 'error');
            return redirect()->route('roles.index');
        }

        DB::beginTransaction();
        try {
            // hapus permission
            $role->revokePermissionTo($role->permissions()->pluck('name')->toArray());
            $role->delete();
            Alert::toast('Data deleted successfully', 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
            Alert::toast('Data failed to delete', 'error');
        } finally {
            DB::commit();
        }
        return redirect()->route('roles.index');
    }

    private function attribute()
    {
        return [
            'name' => 'Nama Role',
            'permissions' => 'Permission',

        ];
    }
}
