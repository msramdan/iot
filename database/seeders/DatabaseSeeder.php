<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SettingApp;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            SettingAppSeeder::class,
            MerchantsCategorySeeder::class,
            BankSeeder::class,
            BussinessSeeder::class,
            RekPoolingSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
