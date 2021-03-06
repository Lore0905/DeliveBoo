<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config('orders');

        foreach ($orders as $order) {
            
            $new_order = new Order();
            $new_order->fill($order);
            $new_order->save();
        }
    }
}
