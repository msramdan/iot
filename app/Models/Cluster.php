<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function instance()
    {
        return $this->belongsTo(Instance::class);
    }

    public function subinstance()
    {
        return $this->belongsTo(Subinstance::class);
    }

    public function device()
    {
        return $this->hasMany(Device::class);
    }
}
