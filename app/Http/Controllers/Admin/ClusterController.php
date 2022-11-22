<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cluster;
use App\Models\Subinstance;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class ClusterController extends Controller
{
    public function index (Subinstance $subinstance)
    {
        if(request()->ajax()){
            return DataTables::of(Cluster::where('subinstance_id', $subinstance->id)->get())
                ->addIndexColumn()
                ->addColumn('action', 'admin.cluster._action')
                ->toJson();
        }

        $kode = IdGenerator::generate([
            'table' => 'clusters', 'field' => 'kode', 'length' => 16, 'prefix' => 'CLU-' . date('Ymd')
        ]);

        return view('admin.cluster.index', compact('subinstance', 'kode'));
    }

    public function create (Subinstance $subinstance)
    {
        
        return view('admin.cluster.create', compact('subinstance'));
    }

    public function store (Subinstance $subinstance)
    {
        $attr = request()->validate([
            'subinstance_id' => 'required',
            'kode' => 'required',
            'name' => 'required'
        ]);

        try {
            Cluster::create($attr);
            $kode = IdGenerator::generate([
                'table' => 'clusters', 'field' => 'kode', 'length' => 16, 'prefix' => 'CLU-' . date('Ymd')
            ]);
            
            return response()->json([
                'message' => 'Cluster successfully created',
                'type' => 'success',
                'data' => ''
            ]);
        } catch (Exception $err) {
            return response()->json([
                'message' => 'Failed to save records',
                'type' => 'error',
            ]);
        }
    }

    public function destroy ($subinstanceId, $id)
    {
        
        $cluster = Cluster::where(['subinstance_id' => $subinstanceId, 'id' => $id])->delete();
        
        return response()->json(['success' => true, 'message' => 'Cluster successfully deleted', 'type' => 'success']);
    }
}
