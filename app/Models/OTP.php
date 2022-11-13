<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class OTP extends Model
{
    use LogsActivity;
    use HasFactory;
    protected static $logUnguarded = true;

    protected $table = 'otp';
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
         -> useLogName('log_otp')
         -> logOnly(['merchant_id', 'email', 'otp_number', 'is_used', 'expired_date', 'regenerate_date'])
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
        return "OTP " .$this->merchant_id . " {$eventName} By "  . $user;
    }
}
