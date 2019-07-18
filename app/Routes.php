<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    protected $fillable = [
        'name', 'description', 'origin_lat', 'origin_lng', 'destination_lat', 'destination_lng', 'waypoints'
    ];
}
