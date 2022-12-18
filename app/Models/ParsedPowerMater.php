<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParsedPowerMater extends Model
{
    use HasFactory;

    protected $table = 'parsed_power_meter';
    protected $guarded = ['id'];

    public function rawdata()
    {
        return $this->belongsTo(Rawdata::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
