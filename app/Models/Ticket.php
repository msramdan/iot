<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function created_by()
    {
        return $this->belongsTo(Instance::class, 'author_id', 'id');
    }
}
