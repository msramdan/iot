<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParsedGasMater extends Model
{
    use HasFactory;

    protected $table = 'parsed_gas_mater';
    protected $guarded = ['id'];

    public function rawdata()
    {
        return $this->belongsTo(Rawdata::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
