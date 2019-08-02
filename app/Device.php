<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'macaddress', 'fcm_token', 'user_id',
    ];
}
