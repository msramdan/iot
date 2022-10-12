<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;

class MerchantApprove extends Model
{
    use LogsActivity;
    use HasFactory;
    protected $guarded = ['id'];
    protected static $logUnguarded = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
         -> useLogName('log_merchants_category')
         -> logOnly(['merchants_category_code','merchants_category_name','merchants_category_title'])
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
        return "Merchants Approve " .$this->merchants_category_name . " {$eventName} By "  . $user;
    }
}
