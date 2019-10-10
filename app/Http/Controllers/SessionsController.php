<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Device;

class SessionsController extends Controller
{
	public function register(){
		
	}

	public function store(){
		$user = request()->user();
		$company = $user->companies()->first();
		$device = Device::where('macaddress', request()->input('macaddress'))->first();

		$existing_session = $user->sessions()->where('status', 'ongoing')->first();
		if($existing_session){
			return array(
				'error' => 'You are already in session.',
				'session' => $existing_session
			);
		}

		$session = Session::create([
			'user_id' => $user->id,
			'device_id' => $device->id,
			'vehicle_id' => request()->input('vehicle_id'),
			'route_id' => request()->input('route_id'),
			'company_id' => $company->id,
			'status' => 'ongoing',
		]);

		return array('session' => $session);
	}
}
