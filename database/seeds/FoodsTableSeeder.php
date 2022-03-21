<?php
use App\Food;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = config('foods');

        foreach($foods as $food){
            $new_food = new Food();
            $new_food->fill($food);
            $new_food->slug = Str::slug($new_food->name);
            $new_food->restaurant_id = 3;
            $new_food->save();
        }
    }
}