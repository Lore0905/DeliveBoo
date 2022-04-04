<?php

namespace App\Http\Controllers\Braintree;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree;
use App\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmedOrderMail;
use App\Restaurant;

class PaymentController extends Controller
{
    public function show($id){

        $order = Order::findOrFail($id);

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
    
        $token = $gateway->ClientToken()->generate();
        return view('payment', compact('token', 'order'));
    }
    
    public function store(Request $request, $id){
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $order = Order::findOrFail($id);


        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
        if ($result->success && $order->total_amount === $amount) {

            $transaction = $result->transaction;
            // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);

            // return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);

            $order->payment_status = 'Successful';
            $order->save();
            
            // mail to customer & user 
            Mail::to($order->customer_email)->send(new ConfirmedOrderMail($order));

            $restaurant_email = ''; 
            foreach($order->foods as $item) {

                $restaurant_email =  $item->restaurant->user->email;
            }
            Mail::to($restaurant_email)->send(new ConfirmedOrderMail($order));


            return view('guest.success');

        } else {
            $errorString = "";
    
            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
    
            // $_SESSION["errors"] = $errorString;
            // header("Location: " . $baseUrl . "index.php");

            return view('guest.failed');

        }
    }
}
