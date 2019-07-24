<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;

class SessionsController extends Controller
{
	public function register(){
		
	}

	public function store(){
		$user = request()->user();
		$company = $user->companies()->first();

		$existing_session = $user->sessions()->where('status', 'ongoing')->first();
		if($existing_session){
			return array(
				'error' => 'You are already in session.',
				'session' => $existing_session
			);
		}

		$session = Session::create([
			'user_id' => $user->id,
			'vehicle_id' => request()->input('vehicle_id'),
			'route_id' => request()->input('route_id'),
			'company_id' => $company->id,
			'status' => 'ongoing',
		]);

		return array('session' => $session);
	}
}
