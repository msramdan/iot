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
        //dd($request);
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'file' => 'required|file|mimes:xlxs'
        //     ]
        // );

        // if ($validator->fails()) {
        //     Alert::toast('Upload failed! invalid format file!', 'error');
        //     return redirect()->back();
        // }

        try {
            // $import = new MerchantImport();
            // $import->onlySheets('Upload Merchant');

            // Excel::import($import, $request->file('file'));
            Excel::import(new MerchantImport, $request->file('file')->store('temp'));

            return redirect()->route('merchant.approval');
        } catch (Exception $e) {
            Log::error($e);

            if ($e instanceof ExcelException){
                $failures = $e->failures();
                //dd($failures);
                foreach ($failures as $failure) {
                    $row = $failure->row();
                    //dd($row);
                    $attribute = $failure->attribute();
                    //dd($attribute);
                    $error = $failure->errors();
                    //dd($error);
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
