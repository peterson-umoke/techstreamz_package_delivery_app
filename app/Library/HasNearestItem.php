<?php

namespace App\Library;

use Illuminate\Database\Eloquent\Builder;

trait HasNearestItem
{
    public function scopeNearest_Items(Builder $query, $latitude, $longtitude, $radius = 400)
    {
        $one_kilometer = 6371;
        $one_mile = 3959;
        return $query->selectRaw("{$one_mile} * acos(cos(radians(?))
                                * cos(radians(lat)) * cos(radians(lng) - radians(?))
                                + sin(radians(?)) * sin(radians(lat))) AS distance", [$latitude, $longtitude, $latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance");
    }
}
