<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->post('/routes', 'RoutesController@list');
Route::middleware('auth:api')->post('/vehicles', 'VehiclesController@list');
Route::middleware('auth:api')->post('/sessions/store', 'SessionsController@store');
Route::middleware('auth:api')->post('/bookings/find', 'BookingsController@find');
Route::middleware('auth:api')->post('/fcm/save', 'DevicesController@save');

Route::post('/register', 'UsersController@save');
