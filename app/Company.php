<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Vehicle;
use App\Routes;

class Company extends Model
{
    protected $fillable = [
        'name', 'email', 'contact',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function routes(){
        return $this->hasMany(Routes::class);
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }
}
