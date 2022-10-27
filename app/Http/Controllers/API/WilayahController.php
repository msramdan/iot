<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    public function kota ($provinsiId)
    {
        $data = DB::table('tbl_kabkot')->where('provinsi_id', $provinsiId)->get();
        $message = 'Berhasil mengambil data kota';

        return response()->json(compact('message', 'data'));
    }
    
    public function kecamatan($kotaId)
    {
        $data = DB::table('tbl_kecamatan')->where('kabkot_id', $kotaId)->get();
        $message = 'Berhasil mengambil data kecamatan';
    
        return response()->json(compact('message', 'data'));
        
    }
    
    public function kelurahan($kecamatanId)
    {
        $data = DB::table('tbl_kelurahan')->where('kecamatan_id', $kecamatanId)->get();
        $message = 'Berhasil mengambil data kelurahan';
    
        return response()->json(compact('message', 'data'));

    }
}
