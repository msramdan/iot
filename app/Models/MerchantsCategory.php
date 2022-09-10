<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantsCategory extends Model
{
    use HasFactory;
    protected $table = 'merchants_category';
    protected $fillable = [
        'merchants_category_name'
    ];
}
