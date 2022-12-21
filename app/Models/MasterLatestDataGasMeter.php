<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLatestDataGasMeter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'master_latest_data_gas_meter';

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}

