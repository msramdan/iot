<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subnet()
    {
        return $this->belongsTo(Subnet::class);
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }
}
