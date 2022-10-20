<?php

namespace App\Imports;

use App\Models\Merchant;
use App\Models\MerchantsCategory;
use App\Models\Bussiness;
use App\Models\Bank;
use App\Models\RekPooling;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\HasReferencesToOtherSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
class MerchantImport implements ToModel,
WithHeadingRow,
WithBatchInserts,
WithChunkReading,
WithValidation
{
    public function model(array $row)
    {
        $merchant_category_id = null;
        $bank_id = null;
        $bussiness_id = null;
        $rek_pooling_id = null;

        if (!empty($row['merchant_category'])) {
            $merchant_category = MerchantsCategory::where('merchants_category_code', $row['merchant_category'])
            ->orwhere('merchants_category_name', $row['merchant_category'])->first();

            if ($merchant_category) {
                $merchant_category_id = $merchant_category->id;
            }
        }

        if (!empty($row['bussiness'])) {
            $bussiness = Bussiness::where('bussiness_code', $row['bussiness'])
                        ->orwhere('bussiness_name')->first();

            if ($bussiness) {
                $bussiness_id = $bussiness->id;
            }
        }

        if (!empty($row['bank'])) {
            $bank = Bank::where('bank_code', $row['bank'])->orwhere('bank_name', $row['bank'])->first();

            if ($bank) {
                $bank_id = $bank->id;
            }
        }

        if (!empty($row['rek_pooling'])) {
            $rek_pooling = RekPooling::where('rek_pooling_code', $row['rek_pooling_code'])->first();

            if ($rek_pooling) {
                $rek_pooling_id = $rek_pooling->id;
            }
        }

        return new Merchant([
            'merchant_name'         => $row['merchant_name'],
            'email'        => $row['merchant_email'],
            'merchant_category_id'  => $merchant_category_id,
            'bussiness_id'          => $bussiness_id,
            'bank_id'               => $bank_id,
            'account_name'          => $row['account_name'],
            'mdr'                   => str_replace("%", "", $row['mdr']),
            'number_account'        => $row['number_account'],
            'rek_pooling_id'        => $rek_pooling_id,
            'phone'                 => $row['phone'],
            'address1'              => $row['address1'],
            'address2'              => $row['address2'],
            'city'                  => $row['city'],
            'zip_code'              => $row['zip_code'],
            'note'                  => $row['note'],
            'password'              => Hash::make($row['password']),
        ]);
    }

    public function rules(): array
    {
        return  [
            'merchant_name' =>  ['required', 'string', 'max:200'],
            'merchant_email' => ['required', 'string', 'email'],
            'merchant_category' => ['string'],
            'bussiness' => ['string'],
            'bank' => ['string'],
            'rek_pooling_code' => ['string'],
            'merchant_category' => ['required', 'string'],
            'account_name' => ['required', 'string'],
            'mdr' => ['required'],
            'number_account' => ['required', 'string'],
            'phone' => ['required'],
            'address1' => ['required', 'string'],
            'address2' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zip_code' => ['required'],
            'note' => ['string'],
            'password' => ['required']
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function headingRow(): int
    {
        return 3;
    }
}
