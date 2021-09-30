<?php

namespace App\Models;

use App\Library\HasMeta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Coupon extends Model
{
    use HasFactory;
    use InteractsWithMedia;
    use HasMeta;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coupon_code',
        'discount',
        'expiry_date',
        'type',
        'limit_users',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'discount' => 'float',
        'expiry_date' => 'date',
    ];

    public function orders()
    {
        return $this->hasManyThrough(Order::class, CouponUsed::class, 'order_id', 'id', 'id', 'coupon_id');
    }

    public function couponUsed()
    {
        return $this->hasMany(CouponUsed::class);
    }

    public function scopeDoesCouponExist(Builder $query, $code)
    {
//        return $query->exi
    }

    public function isCouponUsed($code)
    {
//        return $this->orders()->
    }
}
