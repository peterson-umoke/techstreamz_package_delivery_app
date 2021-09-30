<?php

namespace App\Models;

use App\Library\HasMeta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderTransaction extends Model
{
    use HasFactory, SoftDeletes;
    use HasMeta;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'type',
        'value',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
    ];


    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    public function scopefetchOrder(Builder $query, $id)
    {
        return $query->whereRelation('order', 'id', $id);
    }
}
