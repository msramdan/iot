<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billingdata extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $guarded = ['id'];
}
