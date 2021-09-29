<?php

namespace App\Models;

use App\Library\Hasmeta;
use DB;
use Fouladgar\MobileVerification\Concerns\MustVerifyMobile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Nagy\LaravelRating\Traits\Rate\CanRate;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Fouladgar\MobileVerification\Contracts\MustVerifyMobile as MustVerifyPhoneNumber;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable implements MustVerifyEmail, MustVerifyPhoneNumber
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Billable;
    use HasRoles;
    use CanRate;
    use Hasmeta;
    use InteractsWithMedia;
    use MustVerifyMobile;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $append = [
        'country',
        'name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function addresses()
    {
        return $this->hasMany(DeliveryAddress::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function order_session()
    {
        return $this->hasOne(OrderSession::class);
    }

    public function rider_oder()
    {
        return $this->hasMany(RiderOrder::class);
    }

    public function documents()
    {
        return $this->hasMany(UserDocument::class);
    }

    public function getCountryAttribute()
    {
        return $this->getModelMeta('country_code')->value ?? "NG";
    }

    public function setCountryAttribute($attribute)
    {
        return $this->replaceMeta('country_code', $attribute);
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function scopeAdmins(Builder $query, $role = ['admin', 'superadmin'])
    {
        return $query->role($role);
    }

    public function scopeDrivers(Builder $query, $role = ['driver'])
    {
        return $query->role($role);
    }

    public function scopeCustomer(Builder $query, $role = ['customer'])
    {
        return $query->role($role);
    }

    public function scopeNearest_Drivers(Builder $query, $latitude = 0, $longitude = 0, $radius = 400)
    {
        return $query->selectRaw("6371 * acos(cos(radians(?))
                                * cos(radians(lat)) * cos(radians(lng) - radians(?))
                                + sin(radians(?)) * sin(radians(lat))) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance")
            ->drivers()
            ->where('is_online', 1);
    }
}
