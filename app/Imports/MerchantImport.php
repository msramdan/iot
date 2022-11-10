<?php

namespace App\Imports;

use App\Models\Merchant;
use App\Models\MerchantsCategory;
use App\Models\Bussiness;
use App\Models\Bank;
use App\Models\RekPooling;
use App\Models\Province;
use App\Models\Kabkot;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
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
        $provinsi_id = null;
        $kabkot_id = null;
        $kecamatan_id = null;
        $kelurahan_id = null;

        if (!empty($row['merchant_category'])) {
            $merchant_category = MerchantsCategory::where('merchants_category_code', $row['merchant_category'])
            ->orwhere('merchants_category_name', $row['merchant_category'])->first();

            if ($merchant_category) {
                $merchant_category_id = $merchant_category->id;
            }
        }

        if (!empty($row['bussiness'])) {
            $bussiness = Bussiness::where('bussiness_code', $row['bussiness'])
                        ->orwhere('bussiness_name', $row['bussiness'])->first();

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

        if (!empty($row['province'])) {
            $province = Province::where('provinsi', $row['province'])->first();

            if ($province) {
                $provinsi_id = $province->id;
            }
        }

        if (!empty($row['city'])) {
            $kabkot = Kabkot::where('kabupaten_kota', $row['city'])->first();

            if ($kabkot) {
                $kabkot_id = $kabkot->id;
            }
        }

        if (!empty($row['sub_district'])) {
            $kecamatan = Kecamatan::where('kecamatan', $row['sub_district'])->first();

            if ($kecamatan) {
                $kecamatan_id = $kecamatan->id;
            }
        }

        if (!empty($row['village'])) {
            $kelurahan = Kelurahan::where('kelurahan', $row['kelurahan'])->first();

            if ($kelurahan) {
                $kelurahan_id = $kelurahan->id;
            }
        }

        return new Merchant([
            'merchant_name'         => $row['merchant_name'],
            'email'                 => $row['merchant_email'],
            'merchant_type'         => $row['merchant_type'],
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
            'provinsi_id'           => $provinsi_id,
            'kabkot_id'             => $kabkot_id,
            'kecamatan_id'          => $kecamatan_id,
            'kelurahan_id'          => $kelurahan_id,
            'zip_code'              => $row['zip_code'],
            'note'                  => $row['note'],
            'password'              => Hash::make($row['password']),
        ]);
    }

    public function rules(): array
    {
        return  [
            'merchant_name' =>  ['required', 'string', 'max:200'],
            'merchant_type' => ['required', 'string', 'max:100', 'in:bussiness,personal'],
            'merchant_email' => ['required', 'string', 'email'],
            'merchant_category' => ['string'],
            'bussiness' => ['string'],
            'bank' => ['string'],
            'rek_pooling_code' => ['string'],
            'merchant_category' => ['required', 'string'],
            'account_name' => ['required'],
            'mdr' => ['required'],
            'number_account' => ['required', 'string'],
            'phone' => ['required'],
            'address1' => ['required', 'string'],
            'address2' => ['required', 'string'],
            'provinsi_id' => ['nullable', 'string'],
            'kabkot_id' => ['nullable', 'string'],
            'kecamatan_id' => ['nullable', 'string'],
            'kelurahan_id' => ['nullable', 'string'],
            'zip_code' => ['required'],
            'note' => ['nullable','string'],
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
