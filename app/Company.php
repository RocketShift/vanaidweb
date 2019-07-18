<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Company extends Model
{
    protected $fillable = [
        'name', 'email', 'contact',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
