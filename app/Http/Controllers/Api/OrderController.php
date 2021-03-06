<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Order;
use App\Food;

class OrderController extends Controller
{
    public function store(Request $request){

        $form_data = $request->all();

        $validator = Validator::make($form_data, [
            'customer_name' => 'required|max:255',
            'customer_email' => 'required|max:255|email',
            'customer_address' => 'required|max:255',
            'customer_phone_number' => 'required|max:255',
            'total_amount' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_order = new Order();
        $new_order->fill($form_data);
        $new_order->save();

        foreach ($form_data['selected_element'] as $element) {

            $new_order->foods()->attach($element['id'], ['quantity' => $element['quantity']]);

        }

        // Boolpress
        return response()->json([
            'success' => true,
            'order' => $new_order->id,
            'test' => $new_order
        ]);

    }
}
