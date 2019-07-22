<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Routes;
use App\User;

class RoutesController extends Controller
{
    public function list(Request $request){
    	$user = User::where('username', $request->input('username'))->first();
    	$company = $user->companies()->first();

    	$routes = Routes::where('company_id', $company->id)
               ->orderBy('name', 'desc')
               ->get();

        $counter = 0;
        foreach ($routes as $route) {
        	$routes[0]->waypoints = unserialize($route->waypoints);
        	$counter++;
        }

        return array('routes' => $routes);
    }
}
