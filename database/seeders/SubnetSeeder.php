<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subnet;

class SubnetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subnet = [
            'CH_00-07',
            'CH_08-15',
        ];

        foreach ($subnet as $i => $sub) {
            Subnet::create([
                'subnet' => $sub
            ]);
        }
    }
}
