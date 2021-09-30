<?php

namespace App\Models;

use App\Library\HasNearestItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;
    use InteractsWithMedia;
    use HasNearestItem;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'vehicle_type_id',
        'make',
        'model',
        'year',
        'licence_plate',
        'color',
        'lat',
        'lng',
        'is_online',
        'image',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'vehicle_type_id' => 'integer',
        'is_online' => 'boolean',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(\App\Models\VehicleType::class);
    }

    public function scopeNearest_Vehicles(Builder $query, $latitude, $longitude, $vehicleType = "", $radius = 400)
    {
        return $query
            ->whereHas('vehicleType', function (Builder $query) use ($vehicleType) {
                if (empty($vehicleType)) {
                    return;
                }

                if (is_numeric($vehicleType)) {
                    $query->whereId($vehicleType);
                } else {
                    $query->where('name', 'like', '%' . $vehicleType . '%');
                }
            })
            ->nearest_items($latitude, $longitude, $radius)
            ->where('is_online', 1);
    }
}
