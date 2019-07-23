<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function list(Request $request){
    	$user = $request->user();
    	$company = $user->companies()->first();

    	$routes = $company->routes()
               ->orderBy('name', 'asc')
               ->get();

        $counter = 0;
        foreach ($routes as $route) {
        	$routes[0]->waypoints = unserialize($route->waypoints);
        	$counter++;
        }

        return array('routes' => $routes);
    }
}
