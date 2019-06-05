<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\User;

class UsersController extends Controller
{
    public function save(UsersRequest $request){
    	$user = User::create([
			'username' => $request->input('username'),
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'address' => $request->input('address'),
			'password' => bcrypt($request->input('password'))
		]);

		if($user && $request->ajax()){
			return response()->json(array(
				'success' => 'Successfully created account.',
				'user' => $user,
			));
		}
    }
}
