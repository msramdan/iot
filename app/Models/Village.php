<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $table = 'tbl_kelurahan';
    protected $guarded = ['id'];
    public $timestamps = false;
}
