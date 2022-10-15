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
    protected static $logUnguarded = true;

    protected $guarded = ['id'];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
         -> useLogName('log_merchants')
         -> logOnly(['merchant_id', 'identity_card_photo', 'npwp_photo', 'owner_outlet_photo', 'selfie_ktp_photo', 'outlet_photo', 'in_outlet_photo'])
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
        return "Merchants Approve" .$this->merchant_id . " {$eventName} By "  . $user;
    }
}
