<?php

namespace App\Models;

use App\Library\HasMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nagy\LaravelRating\Traits\Rate\Rateable;
use Spatie\MediaLibrary\InteractsWithMedia;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    use HasMeta;
    use InteractsWithMedia;
    use Rateable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'package_size_id',
        'good_type_id',
        'delivery_type_id',
        'coupon_id',
        'price',
        'discount',
        'delivery_fee',
        'is_cash_on_delivery',
        'total',
        'item_title',
        'item_description',
        'pickup_datetime',
        'sender_name',
        'sender_email',
        'sender_phone',
        'receiver_name',
        'receiver_email',
        'receiver_phone',
        'sender_location_lat',
        'sender_location_lng',
        'sender_location_string',
        'sender_address_detail',
        'receiver_location_lat',
        'receiver_location_lng',
        'receiver_location_string',
        'receiver_address_detail',
        'status',
        'signature',
        'map',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'package_size_id' => 'integer',
        'good_type_id' => 'integer',
        'delivery_type_id' => 'integer',
        'coupon_id' => 'integer',
        'price' => 'float',
        'discount' => 'float',
        'delivery_fee' => 'float',
        'total' => 'float',
        'pickup_datetime' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function packageSize()
    {
        return $this->belongsTo(\App\Models\PackageSize::class);
    }

    public function goodType()
    {
        return $this->belongsTo(\App\Models\GoodType::class);
    }

    public function deliveryType()
    {
        return $this->belongsTo(\App\Models\DeliveryType::class);
    }

    public function coupon()
    {
        return $this->belongsTo(\App\Models\Coupon::class);
    }
}
