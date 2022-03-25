<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index(){

        $restaurants = Restaurant::all();

        return response()->json([
            'success' => true,
            'restaurants' => $restaurants,
        ]);
    }

    public function show($select_type){

        $pivot = DB::table('restaurant_type')->where('type_id', $select_type)->get();

        $restaurant_array = [];

        foreach ($pivot as $item) {
            $restaurant_to_show = Restaurant::where('id', '=', $item->restaurant_id)->get();

            $restaurant_array[] = $restaurant_to_show;
        }

        return response()->json([
            'success' => true,
            'restaurants' => $restaurant_array
        ]);
    }
}
