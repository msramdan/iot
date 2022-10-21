<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user_show')->only('index');
        $this->middleware('permission:user_create')->only('create', 'store');
        $this->middleware('permission:user_update')->only('edit', 'update');
        $this->middleware('permission:user_delete')->only('delete');
    }

    public function index()
    {
        if (request()->ajax()) {
            $query = User::with('roles:id,name');
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('roles', function ($row) {
                    return $row->roles->first()->name;
                })
                ->addColumn('action', 'admin.user._action')
                ->toJson();
        }
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.user.create', [
            'role' => $role
        ]);
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
                'name' => "required|string|max:50|unique:users,name",
                'email' => "required|email|unique:users,email",
                'password' => [
                    'required', 'confirmed', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                ],
                'role' => "required"
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $user = User::create([
                'name'   => $request->name,
                'email'   => $request->email,
                'password'   => Hash::make($request->password),
            ]);
            $user->assignRole($request->role);
            Alert::toast('Data saved successfully', 'success');
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Data failed to save', 'error');
            return redirect()->route('user.index');
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
            'role' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|string|max:50|unique:users,name, " . $user->id,
                'email' => "required|email|unique:users,email," . $user->id,
                'password' => "confirmed",
                'role' => "required"
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
            $user = User::findOrFail($user->id);
            if ($request->password == "" || $request->password == null) {
                $user->update([
                    'name'   => $request->name,
                    'email'   => $request->email,
                ]);
            } else {
                $user->update([
                    'name'   => $request->name,
                    'email'   => $request->email,
                    'password'   => Hash::make($request->password),
                ]);
            }
            $user->syncRoles($request->role);
            Alert::toast('Data updated successfully', 'success');
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Data failed to update', 'error');
            return redirect()->route('user.index');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->removeRole($user->roles->first());
            $user->delete();
            Alert::toast('Data deleted successfully', 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Data failed to delete', 'error');
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }
}
