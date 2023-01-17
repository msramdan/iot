<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;

class SettingApp extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'setting_app';
    protected $fillable = ['app_name', 'logo', 'favicon', 'phone', 'email', 'address', 'tos', 'endpoint_purchase_code', 'token_callback'];
    protected static $logFillable = true;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('log_setting_app')
            ->logOnly(['app_name', 'logo', 'favicon', 'phone', 'email', 'address'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        if (isset(Auth::user()->name)) {
            $user = Auth::user()->name;
        } else {
            $user = "Super Admin";
        }
        return "Setting App {$eventName} By "  . $user;
    }
}
