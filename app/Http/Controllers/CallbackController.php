<?php

namespace App\Http\Controllers;

use App\Models\Rawdata;
use Exception;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function index ()
    {
        $data = request()->all();
        $data['payload_data'] = request()->all();

        try{
            Rawdata::create($data);
        }catch(Exception $err){
            return $err;
        }
    }



}
