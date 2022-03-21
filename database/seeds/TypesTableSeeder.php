<?php

use Illuminate\Database\Seeder;
use App\Type;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'italiano',
            'internazionale',
            'cinese',
            'giapponese',
            'messicano',
            'indiano',
            'americano',
            'thailandese',
            'vegetariano',
            'sushi',
            'greco',
            'pokèria',
            'fast food',
            'pizza'
        ];

        foreach($types as $type) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Str::slug($type);
            $new_type->save();
        }
    }
}
