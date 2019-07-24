<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'user_id', 'route_id', 'vehicle_id', 'company_id', 'status', 'ended_at',
    ];
}
