<?php

namespace Database\Seeders;

use App\Models\MerchantsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MerchantsCategory::create([
            'merchants_category_name' => 'Food',
        ]);
    }
}
