<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\OperationalTime;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class MerchantOpTimeController extends Controller
{

    public function index ($merchantId)
    {
        if(request()->ajax()){
            return DataTables::of(OperationalTime::whereMerchantId($merchantId)->get())
                ->addIndexColumn()
                ->addColumn('opening_hour', function($row){
                    return Carbon::create($row->opening_hour)->format('H:i');
                })
                ->addColumn('closing_hour', function($row){
                    return Carbon::create($row->closing_hour)->format('H:i');
                })
                ->addColumn('closing_hour', function($row){
                    return Carbon::create($row->closing_hour)->format('H:i');
                })
                ->addColumn('action', 'admin.operasional_time._action')
                ->toJson();
        }

        return view('admin.operasional_time.index', [
            'merchant' => Merchant::whereId($merchantId)->firstOrFail()
        ]);
    }
    
    public function create($merchantId)
    {
        return view('admin.operasional_time.create', [
            'merchant' => Merchant::whereId($merchantId)->firstOrFail()
        ]);
    }

    public function show ($merchantId, $id)
    {
        return view('admin.operasional_time.create', [
            'merchant' => Merchant::with('optime')->whereId($merchantId)->firstOrFail()
        ]);
    }

    public function store ($merchantId)
    {
        $attr = request()->validate([
            'day' => 'required',
            'opening_hour' => 'required',
            'closing_hour' => 'required',
        ]);

        $attr['merchant_id']  = $merchantId;

        try{
            OperationalTime::create($attr);
            Alert::toast('Data Successfully Created', 'success');
        }catch(Exception $e){
            Alert::toast('Data failed to save', 'error');
        }

        return redirect()->route('merchant.optime.index', $merchantId);
    }

    public function edit($merchantId, $id)
    {   
        $where =  [
            'id' => $id,
            'merchant_id' => $merchantId,
        ];

        return view('admin.operasional_time.edit', [
            'optime' => OperationalTime::where($where)->firstOrFail()
        ]);
    }

    public function update ($merchantId, $id)
    {
        $attr = request()->validate([
            'day' => 'required',
            'opening_hour' => 'required',
            'closing_hour' => 'required',
        ]);

        $where = [
            'id' => $id,
            'merchant_id' => $merchantId,
        ];

        try{
            OperationalTime::where($where)->update($attr);
            Alert::toast('Data Successfully update', 'success');
        }catch(Exception $e){
            Alert::toast('Data failed to update', 'error');
        }
        
        return redirect()->route('merchant.optime.index', $merchantId);

    }

    public function destroy ($merchantId, $id)
    {
        $where = [
            'id' => $id,
            'merchant_id' => $merchantId,
        ];

        try {
            OperationalTime::where($where)->delete();
            Alert::toast('Data Successfully delete', 'success');
        } catch (Exception $e) {
            Alert::toast('Data failed to delete', 'error');
        }

        return redirect()->route('merchant.optime.index', $merchantId);
    }
}
