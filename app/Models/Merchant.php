<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Merchant extends Authenticatable implements JWTSubject
{
    use LogsActivity;
    use HasFactory;
    protected static $logUnguarded = true;

    protected $guarded = ['id'];

    protected $hidden = [
        'password'
    ];

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

    public function mdr_log()
    {
        return $this->hasMany(MdrLog::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function merchant_approve()
    {
        return $this->hasOne(MerchantApprove::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
         -> useLogName('log_merchants')
         -> logOnly(['merchant_name','email','phone', 'address1', 'address2', 'city', 'zip_code' ,'note'])
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


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
