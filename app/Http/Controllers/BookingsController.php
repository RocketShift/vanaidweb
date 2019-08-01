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

        $selected_municipalities = array(request()->input('pickup_address'));
    	foreach ($routes as $route) {
    		$municipalities = array();
    		foreach ($route->municipalities as $municipality) {
    			$municipalities[] = $municipality->municipality;
    		}

    		$base_index = array_search(request()->input('pickup_address'), $municipalities);
            if(isset($municipalities[$base_index - 1]) && !in_array($municipalities[$base_index - 1], $selected_municipalities)){
                $selected_municipalities[] = $municipalities[$base_index - 1];
            }

            if(isset($municipalities[$base_index + 1]) && !in_array($municipalities[$base_index + 1], $selected_municipalities)){
                $selected_municipalities[] = $municipalities[$base_index + 1];
            }
    	}

    	return $selected_municipalities;
    }
}
