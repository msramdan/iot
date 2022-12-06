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
            'ch_00-07',
            'ch_08-15',
        ];

        foreach ($subnet as $i => $sub) {
            Subnet::create([
                'subnet' => $sub
            ]);
        }
    }
}
