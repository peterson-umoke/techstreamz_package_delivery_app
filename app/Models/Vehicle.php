<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;
    use InteractsWithMedia;

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
        'long',
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
}
