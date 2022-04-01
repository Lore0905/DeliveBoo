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

        foreach ($restaurants as $restaurant) {
            if ($restaurant->image) {
                $restaurant->image = url('storage/' . $restaurant->image);
            }
        }

        return response()->json([
            'success' => true,
            'restaurants' => $restaurants,
        ]);
    }

    public function show($select_type){

        $pivot = DB::table('restaurant_type')->where('type_id', $select_type)->get();
        
        $restaurant_array = [];

        foreach ($pivot as $item) {
            
            $restaurant_to_show = Restaurant::where('id', '=', $item->restaurant_id)->with('types')->first();
            // dd($restaurant_to_show);
            if($restaurant_to_show->image) {
                $restaurant_to_show->image = url('storage/' . $restaurant_to_show->image);
            }

            $restaurant_array[] = $restaurant_to_show;

        }
        // dd($restaurant_array);
        return response()->json([
            'success' => true,
            'restaurants' => $restaurant_array
        ]);
    }

    public function foods($slug) {

        $restaurant = Restaurant::where('slug', '=', $slug)->with(['foods'])->first();

        foreach ($restaurant->foods as $food) {
            if ($food->img) {
                $food->img = url('storage/' . $food->img);
            }
        }
        
        if($restaurant) {
            return response()->json([
                'success' => true,
                'results' => $restaurant
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => []
            ]);
        }
    }
}
