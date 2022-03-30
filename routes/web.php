<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


// ROUTE TEST

Route::get('/payment', function () {

    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);

    $token = $gateway->ClientToken()->generate();
    return view('test-view', compact('token'));
});

Route::post('/checkout', function(Request $request) {
    
    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);
    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;

    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

    if ($result->success) {
        $transaction = $result->transaction;
        // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
        return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
    } else {
        $errorString = "";

        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }

        // $_SESSION["errors"] = $errorString;
        // header("Location: " . $baseUrl . "index.php");
        return back()->withErrors('An error occured with the message:'. $result->message);
    }
});

// ROUTE test 


Route::get('{any}', function(){
    return view('guest.home');
})->where("any", ".*");

