<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Vehicle extends Model
{
    protected $fillable = [
        'plate_no', 'color', 'company_id',
    ];

    public function company(){
        return $this->hasOne(Company::class);
    }
}
