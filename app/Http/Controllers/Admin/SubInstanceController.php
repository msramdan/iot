<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instance;
use App\Models\Subinstance;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubInstanceController extends Controller
{
    public function create (Instance $instance)
    {
        $id = IdGenerator::generate(['table' => 'subinstances', 'field' => 'code_subinstance', 'length' => 16, 'prefix' => 'SIN-' . date('Ymd')]);
        
        return view('admin.subinstance.create', compact('instance', 'id'));
    }

    public function store ($instanceId)
    {
        $attr = request()->validate([
            'code_subinstance' => 'required',
            'name_subinstance' => 'required'
        ]);

        $attr['instance_id'] = $instanceId;

        try {
            Subinstance::create($attr);
            Alert::toast('Subinstance successfully created', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to save records', 'error');
        }

        return redirect()->route('instance.index');
    }


    public function edit ($instanceId, Subinstance $subinstance)
    {
        return view('admin.subinstance.edit', compact('subinstance'));
    }

    public function update ($instanceId, Subinstance $subinstance)
    {
        $attr = request()->validate([
            'code_subinstance' => 'required',
            'name_subinstance' => 'required'
        ]);

        try {
            $subinstance->update($attr);
            Alert::toast('Subinstance successfully updated', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to update records', 'error');
        }

        return redirect()->route('instance.index');
    }

    public function destroy ($instanceId, $id)
    {
        try {
            Subinstance::where(['instance_id' => $instanceId, 'id' => $id])->delete();
            Alert::toast('Subinstance successfully deleted', 'success');
        } catch (Exception $err) {
            Alert::toast('Failed to delete records', 'error');
        }


        return redirect()->route('instance.index');
    }

    
}
 