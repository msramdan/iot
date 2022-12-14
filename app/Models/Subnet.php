<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subnet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function device()
    {
        return $this->hasMany(Device::class);
    }
}
