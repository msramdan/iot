<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawdata extends Model
{
    use HasFactory;
    protected $table = 'rawdata';
    protected $guarded = ['id'];
}
