<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;

class Bank extends Model
{
    use HasFactory;
    use LogsActivity;
    protected static $logUnguarded = true;
    protected $guarded = ['id'];

    public function rek_pooling()
    {
        return $this->hasMany(RekPooling::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
         -> useLogName('log_banks')
         -> logOnly(['bank_code','bank_name'])
         -> logOnlyDirty()
         -> dontSubmitEmptyLogs();
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        if (isset(Auth::user()->name)) {
            $user = Auth::user()->name;
        } else {
            $user = "Super Admin";
        }
        return "Bank " .$this->bank_name . " {$eventName} By "  . $user;
    }
}
