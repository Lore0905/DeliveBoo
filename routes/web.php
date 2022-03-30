<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('home');

        // Restaurant Create
        Route::get('/restaurant/create', 'RestaurantController@create')->name('restaurant.create');

        // Restaurant Store
        Route::post('/restaurant/store', 'RestaurantController@store')->name('restaurant.store');
        
        // Restaurant Show 
        Route::get('/restaurant/{id}', 'RestaurantController@show')->name('restaurant.show');

        // Crud food
        Route::resource('foods', 'FoodController');

        // Orders Index
        Route::get('/orders', 'OrderController@index')->name('orders');
    });

// Orders Store
Route::post('/orders/store', 'Admin\OrderController@store')->name('orders.store');


// Braintree

Route::get('/payment', 'Braintree\PaymentController@show');

Route::post('/checkout', 'Braintree\PaymentController@store');


Route::get('{any}', function(){
    return view('guest.home');
})->where("any", ".*");

