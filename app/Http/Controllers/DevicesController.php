<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;

class DevicesController extends Controller
{
    public function save(){
    	$device = Device::updateOrCreate(array(
			'macaddress' => request()->input('macaddress'),
		),
		array(
    		'macaddress' => request()->input('macaddress'),
    		'fcm_token' => request()->input('fcm_token'),
    		'user_id' => request()->user()->id,
    	));
    }
}
