<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class MerchantsCategory extends Model
{
    use LogsActivity;
    use HasFactory;
    protected $table = 'merchants_category';
    protected $guarded = ['id'];
    protected static $logUnguarded = true;


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
         -> useLogName('log_merchants_category')
         -> logOnly(['merchants_category_name'])
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
        return "Merchants category " .$this->merchants_category_name . " {$eventName} By "  . $user;
    }
}
