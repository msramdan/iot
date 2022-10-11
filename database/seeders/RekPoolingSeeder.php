<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RekPoolingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rek_poolings')->insert([
            [
                'rek_pooling_code' => 'RK001',
                'bank_id' => 1,
                'account_name' => 'Indopay Bank A',
                'number_account' => '12345675432',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
