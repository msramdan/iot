<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DailyUsageDevice;

class ClusterDailyUsage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $datas = DailyUsageDevice::with('device')->get();

       foreach ($datas as $data) {
            $data->update([
                'cluster_id' => $data->device->cluster_id
            ]);
       }

    }
}
