<?php

namespace App\Models;

use App\Library\HasMeta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
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
        return $this->hasManyThrough(Order::class, CouponUsed::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, CouponUsed::class);
    }

    public function couponUsed()
    {
        return $this->hasMany(CouponUsed::class);
    }

    public function scopeDoesCouponExist(Builder $query, $code)
    {
//        return $query->exi
    }

    public function scopeifCouponUsed(Builder $query, $user_id, $code)
    {
        return $query->leftJoin('coupon_useds', function ($join) {
            $join->on('coupon_useds.id', '=', 'coupons.id');
        })->leftJoin('orders', function ($join) {
            $join->on('orders.id', '=', 'coupon_useds.id');
        })->where('orders.user_id', $user_id)->where('coupons.coupon_code', $code);
    }
//
//    public function scopeCheckCode(Builder $query, $code, $user_id = '')
//    {
//        return $query
//            ->whereCode($code)
//            ->whereHas('users.id', function (Builder $query) use ($user_id) {
//                $query->where('id', $user_id);
//            });
//    }
}
