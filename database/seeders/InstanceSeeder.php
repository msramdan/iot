<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Instance;
use App\Models\Subinstance;
use App\Models\Cluster;
use Illuminate\Support\Facades\Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class InstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instance_code = IdGenerator::generate(['table' => 'instances', 'field' => 'instance_code', 'length' => 16, 'prefix' => 'ISC-' . date('Ymd')]);

        $instance = Instance::create([
            'instance_code' => $instance_code,
            'instance_name' => 'Arta Kencana',
            'appID' => 1,
            'address1' => 'Jl. buana',
            'address2' => 'Jl. buntu',
            'zip_code' => '666666',
            'email' => 'artakencana@gmail.com',
            'phone' => '085213424432',
            'bussiness_id' => 1,
            'username' => 'artakencana123',
            'password' => Hash::make('12345678'),
            'longitude' => '108.431134',
            'latitude' => '-6.8384545'
        ]);

        for ($i = 0; $i < 10 ; $i++) {
            $subinstance_code = IdGenerator::generate(['table' => 'subinstances', 'field' => 'code_subinstance', 'length' => 16, 'prefix' => 'SIN-' . date('Ymd')]);

            $sub_instance = Subinstance::create([
                'instance_id' => $instance->id,
                'code_subinstance' => $subinstance_code,
                'name_subinstance' => 'Sub Instance '.$i,
            ]);

            for ($a = 0; $a < 10 ; $a++) {
                $kode = IdGenerator::generate([
                    'table' => 'clusters', 'field' => 'kode', 'length' => 16, 'prefix' => 'CLU-' . date('Ymd')
                ]);

                $cluster = Cluster::create([
                    'subinstance_id' => $sub_instance->id,
                    'kode' => $kode,
                    'name' => 'Cluster '.$a,
                ]);
            }
        }
    }
}
