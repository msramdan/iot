<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\MerchantImport;
use Exception;
use Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Validators\ValidationException as ExcelException;
use RealRashid\SweetAlert\Facades\Alert;

class MerchantUploadController extends Controller
{
    public function import_excel(Request $request)
    {
        try {
            Excel::import(new MerchantImport, $request->file('file')->store('temp'));

            return redirect()->route('merchant.approval');
        } catch (Exception $e) {
            Log::error($e);

            if ($e instanceof ExcelException){
                $failures = $e->failures();
                foreach ($failures as $failure) {
                    $row = $failure->row();

                    $attribute = $failure->attribute();
                    $error = $failure->errors();
                    $value = $failure->values();
                    Alert::toast("Data failed upload data {$error[0]}" , 'error');
                    return redirect()->back();
                }
            }
            Alert::toast($e->getMessage(), 'error');
            return redirect()->back();
        }


    }
}
