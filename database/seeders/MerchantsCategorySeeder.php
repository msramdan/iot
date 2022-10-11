<?php

namespace Database\Seeders;

use App\Models\MerchantsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchantsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merchants_category')->insert([
            [
                'merchants_category_code' => 'MC001',
                'merchants_category_name' => 'Pendidikan',
                'merchants_category_title' => '-',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
