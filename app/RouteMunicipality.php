<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RouteMunicipality extends Model
{
    protected $fillable = [
        'municipality', 'route_id',
    ];

    public function route(){
    	return $this->belongsTo(Route::class);
    }
}
