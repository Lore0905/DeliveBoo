<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\User;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::all();

        $user = Auth::user();

        $orders_array = [];

        foreach ($orders as $order) {
            
            foreach ($order->foods as $food) {
                
                if ($food->restaurant_id === $user->restaurant->id) {
                    
                    if(!in_array($order, $orders_array)) {
                        $orders_array[] = $order;
                    }
                    
                } 
            }
        }
        
        $data = [
            'orders' => $orders_array
        ];
        
        return view('admin.orders.index', $data);
    }

    public function store(Request $request){

        $form_data = $request->all();

        $validator = Validator::make($form_data,[
            'customer_name' => 'required|max:255',
            'customer_email' => 'required|max:255|email',
            'customer_address' => 'required|max:255',
            'customer_phone_number' => 'required|max:30',
            'total_amount' => 'required'
        ]);

        // dd($form_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_order = new Order();
        $new_order->fill($form_data);
        $new_order->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
