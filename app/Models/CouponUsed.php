<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponUsed extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'user_id',
        'coupon_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'user_id' => 'integer',
        'coupon_id' => 'integer',
    ];


    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(\App\Models\Coupon::class);
    }

    public function scopeIsUsed(Builder $query, $coupon_id, $user_id)
    {
        return $query->whereRelation('coupon', 'id', $coupon_id)
            ->whereRelation('user', 'id', $user_id);
    }

//    public function countUsedTimes($coupon_id)
//    {
//        return $this->newQuery()->where('coupon_id', $coupon_id);
//    }
}
