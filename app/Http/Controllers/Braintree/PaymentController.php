<?php

namespace App\Http\Controllers\Braintree;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree;
use App\Order;

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
            // $order->update(['payment_status' => 'Successful']);

            // return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);

            $order->payment_status = 'Successful';
            $order->save();
            
            return view('guest.success');

        } else {
            $errorString = "";
    
            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
    
            // $_SESSION["errors"] = $errorString;
            // header("Location: " . $baseUrl . "index.php");

            // return back()->withErrors('An error occured with the message:'. $result->message);

        }
    }
}
