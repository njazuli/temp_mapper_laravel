<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    const CATEGORIES = [
        'climate_change' => 'Climate Change',
        'lake_profiling' => 'Lake Profiling',
        'oceanography_profiling' => 'Oceanography profiling',
        'iot_rainwater_harvesting' => 'IOT - Rainwater Harvesting',
    ];

    protected $fillable = ['category', 'date', 'lat', 'lon', 'temp'];
}