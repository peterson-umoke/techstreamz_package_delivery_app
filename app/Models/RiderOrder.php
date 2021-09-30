<?php

namespace App\Models;

use App\Library\HasMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;

class RiderOrder extends Model
{
    use HasFactory, SoftDeletes;
    use InteractsWithMedia;
    use HasMeta;

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
    ];


    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
