<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function list(Request $request){
    	$user = $request->user();
    	$company = $user->companies()->first();

    	$vehicles = $company->vehicles()
               ->orderBy('plate_no', 'asc')
               ->get();

        return array('vehicles' => $vehicles);
    }
}
