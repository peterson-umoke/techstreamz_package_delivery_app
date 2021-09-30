<?php

namespace App\Models;

use App\Library\HasMeta;
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
}
