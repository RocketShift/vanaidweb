<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use App\Booking;
use App\RouteMunicipality;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    public function find(){
    	$booking = Booking::create([
    		'pickup_lat' => request()->input('pickup_lat'),
    		'pickup_lng' => request()->input('pickup_lng'),
    		'pickup_address' => request()->input('pickup_address'),
    		'dropoff_lat' => request()->input('dropoff_lat'),
    		'dropoff_lng' => request()->input('dropoff_lng'),
    		'dropoff_address' => request()->input('dropoff_address'),
    		'user_id' => request()->user()->id,
    	]);

    	$routes = Route::whereExists(function ($query) {
	        	$query->select("route_municipalities.id")
	            	->from('route_municipalities')
	              	->whereRaw('route_municipalities.route_id = routes.id')
	              	->whereRaw('route_municipalities.municipality = "'.request()->input('pickup_address').'"');
		    })->get();

    	foreach ($routes as $route) {
    		$municipalities = array();
    		foreach ($route->municipalities as $municipality) {
    			$municipalities[] = $municipality->municipality;
    		}

    		
    	}

    	return $routes;
    }
}
