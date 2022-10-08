<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
class Merchant extends Model
{
    use LogsActivity;
    use HasFactory;
    protected static $logUnguarded = true;

    protected $guarded = ['id'];

    public function merchant_category()
    {
        return $this->belongsTo(MerchantsCategory::class);
    }

    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function rek_pooling()
    {
        return $this->belongsTo(RekPooling::class);
    }

    public function approval_log()
    {
        return $this->hasMany(ApprovalLogMerchant::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
         -> useLogName('log_merchants')
         -> logOnly(['merchant_name','merchant_email','phone', 'address1', 'address2', 'city', 'zip_code' ,'note'])
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
        return "Merchants " .$this->merchant_name . " {$eventName} By "  . $user;
    }
}
