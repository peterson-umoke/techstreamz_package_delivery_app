<?php

namespace App\Models;

use App\Enums\AdminResponse;
use App\Enums\RiderResponse;
use App\Enums\UserResponse;
use App\Library\HasMeta;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;

class RiderOrder extends Model
{
    use HasFactory, SoftDeletes;
    use InteractsWithMedia;
    use HasMeta;
    use CastsEnums;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'user_id',
        'assign_datetime',
        'rider_response',
        'rider_response_datetime',
        'user_response',
        'user_response_datetime',
        'on_the_way_to_pickup',
        'pickup_datetime',
        'on_the_way_to_dropoff',
        'delivered',
        'notification',
        'admin_response',
        'admin_response_datetime',
        'map',
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
        'assign_datetime' => 'datetime',
        'rider_response_datetime' => 'datetime',
        'user_response_datetime' => 'datetime',
        'on_the_way_to_pickup' => 'datetime',
        'pickup_datetime' => 'datetime',
        'on_the_way_to_dropoff' => 'datetime',
        'delivered' => 'datetime',
        'admin_response_datetime' => 'datetime',
        'admin_response' => AdminResponse::class,
        'user_response' => UserResponse::class,
        'rider_response' => RiderResponse::class,
    ];


    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class)
            ->drivers();
    }

    public function driver()
    {
        return $this->user();
    }

    public function scopeGetRiderOrderAgainstOrderID(Builder $query, $order)
    {
        return $this
            ->getOrderRel($order)
            ->where('rider_response', RiderResponse::Cancel);
    }

//    public function scopeisAssigned(Builder $query, $orderId)
//    {
//        return $query
//            ->getOrderRel($orderId)
//            ->where('rider_response', [RiderResponse::Pending, RiderResponse::Accept])
//            ->where('delivered', '0000-00-00 00:00:00');
//    }

//    public function scopeIsEmptyOnTheWayToPickeupTime(Builder $query, $order)
//    {
//        return $this
//            ->getOrderRel($order)
//            ->where('on_the_way_to_pickup', '0000-00-00 00:00:00');
//    }
//
//    public function scopeIsEmptyPickUpTime(Builder $query, $order)
//    {
//        return $this
//            ->getOrderRel($order)
//            ->where('pickup_time', '0000-00-00 00:00:00');
//    }
//
//    public function scopeGetCompletedOrders(Builder $query, $order)
//    {
//        return $this
//            ->getOrderRel($order)
//            ->where('rider_response', RiderResponse::Accept)
//            ->where('delivered', '0000-00-00 00:00:00');
//    }

    /**
     * @param Builder $query
     * @param $order
     * @return Builder
     */
    private function scopeGetOrderRel(Builder $query, $order): Builder
    {
        return $query
            //            ->where('order_id', $orderId)
            ->whereRelation('order', 'id', $order);
    }
}
