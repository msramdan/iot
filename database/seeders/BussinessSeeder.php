<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BussinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bussinesses')->insert([
            [
                'bussiness_code' => 'BUS001',
                'bussiness_name' => 'Retail',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
