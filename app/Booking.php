<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'pickup_lat', 'pickup_lng', 'pickup_address', 'dropoff_lat', 'dropoff_lng', 'dropoff_address', 'status', 'session_id', 'user_id', 'device_id', 'booked_at',
    ];
}
