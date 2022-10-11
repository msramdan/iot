<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            [
                'bank_code' => 'B001',
                'bank_name' => 'BNI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => 'B002',
                'bank_name' => 'BRI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => 'B003',
                'bank_name' => 'MANDIRI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => 'B004',
                'bank_name' => 'BCA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => 'B005',
                'bank_name' => 'BJB',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
