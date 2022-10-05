<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;

class RekPooling extends Model
{
    use LogsActivity;
    use HasFactory;

    protected $guarded = ['id'];
    protected static $logUnguarded = true;

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
         -> useLogName('log_rek_pooling')
         -> logOnly(['rek_pooling_code', 'bank_id', 'account_name', 'number_account'])
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
        return "Rek pooling " .$this->rek_pooling_code . " {$eventName} By "  . $user;
    }
}
