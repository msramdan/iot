<?php

namespace Database\Seeders;

use App\Models\SettingApp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SettingAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingApp::create([
            'app_name' => 'Manajemen IOT Device',
            'logo' => '',
            'favicon' => '',
            'phone' => '083874731480',
            'email' => 'saepulramdan244@gmail.com',
            'address' => 'Perumahan SAI Residance Blok E6 , Tajur halang, Kabupaten Bogor',
            'token_callback' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c=',
        ]);
    }
}
