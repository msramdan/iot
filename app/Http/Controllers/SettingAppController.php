<?php

namespace App\Http\Controllers;

use App\Models\SettingApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingAppController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:setting_app_show')->only('index');
        $this->middleware('permission:setting_app_update')->only('update');
    }

    public function index()
    {
        $setting_app = SettingApp::all()->first();
        return view('setting_app.index', ['setting_app' => $setting_app]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'app_name' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|string',
                'address' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();

        try {
            $setting_app = SettingApp::findOrFail($id);
            if ($request->file('logo') != null || $request->file('logo') != '') {
                //hapus old logo
                Storage::disk('local')->delete('public/img/setting_app/' . $setting_app->logo);
                //upload new logo
                $logo = $request->file('logo');
                $logo->storeAs('public/img/setting_app', $logo->hashName());
                $setting_app->update([
                    'logo'     => $logo->hashName(),
                ]);
            }

            if ($request->file('favicon') != "" || $request->file('favicon') != null) {
                Storage::disk('local')->delete('public/img/setting_app/' . $setting_app->favicon);
                $banner = $request->file('favicon');
                $banner->storeAs('public/img/setting_app', $banner->hashName());
                $setting_app->update([
                    'favicon'     => $banner->hashName(),
                ]);
            }
            $setting_app->update([
                'app_name' => $request->app_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
            ]);
            if ($setting_app) {
                Alert::toast('Data updated successfully', 'success');
                return redirect()->route('settingApp.index', 1);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::toast('Data failed to update', 'error');
            return redirect()->route('settingApp.index', 1);
        } finally {
            DB::commit();
        }
    }
}
