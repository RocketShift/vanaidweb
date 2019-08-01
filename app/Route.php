<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'name', 'description', 'origin_lat', 'origin_lng', 'destination_lat', 'destination_lng', 'waypoints'
    ];

    public function municipalities(){
        return $this->hasMany(RouteMunicipality::class);
    }
}
