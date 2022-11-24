<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subinstance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function instance()
    {
        return $this->belongsTo(Instance::class);
    }

    public function cluster()
    {
        return $this->hasMany(Cluster::class);
    }
}
