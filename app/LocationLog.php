<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationLog extends Model
{
    protected $fillable = [
        'lat', 'lng', 'user_id', 'session_id', 'municipality', 'current',
    ];
}
