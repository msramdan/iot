<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLatestDataPowerMeter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'master_latest_data_power_meter';

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}

