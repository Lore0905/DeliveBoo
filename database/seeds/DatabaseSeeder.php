<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
