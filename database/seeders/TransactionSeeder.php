<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Merchant;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0;$i <= 100; $i++) {
          $merchant =  Merchant::create([
                'mid' => Str::random(10),
                'nmid' => 'IDN',
                'merchant_name' => 'merchant'.$i,
                'email' => 'merchant'.($i+1).'@gmail.com',
                'merchant_category_id' => 1,
                'type' => 'personal',
                'bussiness_id'=>1,
                'bank_id' => mt_rand(1,5),
                'account_name' => 'Merchant'.$i,
                'mdr'=> mt_rand(2,6),
                'number_account' => mt_rand(111111111,999999999),
                'rek_pooling_id' => 1,
                'phone' => '08983499333'.$i,
                'zip_code' => 63163,
                'address1' => 'idugfsdfusdgbfuysdfgsd',
                'address2' => 'dgfusdgfysdgfsd sdnfisduif sdifynfisd fisdyfisd f',
                'is_active' => 1,
                'is_force_pass' => 1,
                'approved1' => 'approved',
                'approved2' => 'approved',
                'password' => Hash::make('12345678'),
            ]);

            $last_month = Carbon::today()->firstOfMonth();

            $date = [
                $last_month,
                $last_month->copy()->subMonth(1)->firstOfMonth(),
                $last_month->copy()->subMonth(2)->firstOfMonth(),
                $last_month->copy()->subMonth(3)->firstOfMonth(),
                $last_month->copy()->subMonth(4)->firstOfMonth(),
                $last_month->copy()->subMonth(5)->firstOfMonth(),
                $last_month->copy()->subMonth(6)->firstOfMonth(),
                $last_month->copy()->subMonth(7)->firstOfMonth(),
                $last_month->copy()->subMonth(8)->firstOfMonth(),
                $last_month->copy()->subMonth(9)->firstOfMonth(),
                $last_month->copy()->subMonth(10)->firstOfMonth(),
            ];

            $select_data = $date[mt_rand(0,10)];

            for ($a = 0; $a < 5; $a++) {
                $transaction = Transaction::create([
                    'merchant_id' => $merchant->id,
                    'mti' => 'hn7feifd',
                    'date_transaction' => Carbon::now(),
                    'pan' => Str::random(10),
                    'rrn' => Str::random(10),
                    'tid' => Str::random(10),
                    'customer_name' => 'Customer '.$merchant->merchant_name.$a,
                    'transaction_type' => 'direct',
                    'mdr_amount' => 1000000 * $merchant->mdr/100,
                    'amount' => 1000000,
                    'total_amount' => (1000000 + (1000000 * $merchant->mdr/100)),
                    'status' => 'success',
                    'created_at' => $select_data,
                    'updated_at' => $select_data,
                ]);
            }
        }
    }
}
