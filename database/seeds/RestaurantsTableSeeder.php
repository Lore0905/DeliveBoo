<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use Illuminate\Support\Str;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('restaurants');


        foreach ($restaurants as $restaurant) {

            $new_restaurant = new Restaurant();
            $new_restaurant->fill($restaurant);
            $new_restaurant->slug = Str::slug($new_restaurant->name);
            $new_restaurant->vat = rand(10000000000,99999999999); 
            $new_restaurant->save();

        }
    }
}
