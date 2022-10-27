<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\OTP;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class OTPController extends Controller
{
    public function index ()
    {
        if(request()->ajax()){
            return DataTables::of(OTP::query())
                ->addIndexColumn()
                ->addColumn('action', 'admin.otp._action')
                ->toJson();
        }

        return view('admin.otp.index');
    }

    public function create ()
    {
        return view('admin.otp.create', [
            'merchants' => Merchant::all()
        ]);
    }

    public function store ()
    {
        $attr = request()->validate([
            'merchant_id'   => 'required',
            'email'         => 'required',
            'otp_number'    => 'numeric',
            'expired_date'   => 'required|date'
        ]);

        try{
            OTP::create($attr);
            Alert::toast('Otp successfully created', 'success');
            return redirect()->route('otp.index');
            
        }catch(Exception $err){

            Alert::toast('Data failed to save', 'error');
            return redirect()->route('otp.index');
        }
    }

    public function edit ($id)
    {

        return view('admin.otp.edit', [
            'otp' => OTP::whereId($id)->firstOrFail(),
            'merchants' => Merchant::all()
        ]);
        
    }

    public function update ($id)
    {
        $attr = request()->validate([
            'merchant_id'   => 'required',
            'email'         => 'required',
            'otp_number'    => 'numeric',
            'expired_date'   => 'required|date'
        ]);

        try {
            OTP::whereId($id)->update($attr);
            Alert::toast('Otp successfully updated', 'success');
        } catch (Exception $err) {

            Alert::toast('Data failed to update', 'error');
        }

        return redirect()->route('otp.index');
    }

    public function destroy ($id)
    {
        try {
            Otp::whereId($id)->delete();
            Alert::toast('Otp successfully deleted', 'success');
        } catch (Exception $err) {

            Alert::toast('Data failed to delete', 'error');
        }

        return redirect()->route('otp.index');
    }
}
