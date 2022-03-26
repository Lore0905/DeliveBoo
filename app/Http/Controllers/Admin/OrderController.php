<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
