<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLatestData extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'master_latest_datas';

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
