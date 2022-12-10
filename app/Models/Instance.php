<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class Instance extends Authenticatable
{
    use LogsActivity;
    use HasFactory, HasRoles;
    protected static $logUnguarded = true;

    protected $guarded = ['id'];

    protected $hidden = [
        'password'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }

    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class);
    }

    public function subinstance()
    {
        return $this->hasMany(Subinstance::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
         -> useLogName('log_instances')
         -> logOnly(['instance_code', 'instance_name','email','phone', 'address1', 'address2', 'province_id','city_id', 'district_id', 'village_id', 'zip_code', 'bussiness_id', 'username', 'password', 'longitude', 'latitude'])
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
        return "Instance " .$this->instance_name . " {$eventName} By "  . $user;
    }
}
