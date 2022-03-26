<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API Products
Route::get('/restaurants', 'Api\RestaurantController@index');

Route::get('/restaurants/{select_type}', 'Api\RestaurantController@show');

Route::get('/restaurant/{slug}', 'Api\RestaurantController@foods');

// API Types
Route::get('/types', 'Api\TypeController@index');


