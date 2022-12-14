<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawdata extends Model
{
    use HasFactory;
    protected $table = 'rawdata';
    protected $guarded = ['id'];

    public function instance()
    {
        return $this->belongsTo(instance::class, 'appID', 'appID');
    }

    public function device()
    {
        return $this->hasOne(Device::class, 'devEUI', 'devEUI');
    }

    public function parsed_water_meter()
    {
        return $this->hasOne(ParsedWaterMater::class);
    }
}
