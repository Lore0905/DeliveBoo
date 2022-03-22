<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => 'Giovanni',
                "email" => 'giovanni@mail.com',
                "password" => bcrypt('12345678')
            ],
            [
                "name" => 'Luca',
                "email" => 'luca@mail.com',
                "password" => bcrypt('12345678')
            ],
            [
                "name" => 'Pippo',
                "email" => 'pippo@mail.com',
                "password" => bcrypt('12345678')
            ],
            [
                "name" => 'Marco',
                "email" => 'marco@mail.com',
                "password" => bcrypt('12345678')
            ],
            [
                "name" => 'Antonio',
                "email" => 'antonio@mail.com',
                "password" => bcrypt('12345678')
            ],
        ];

        foreach ($users as $user) {
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];
            $new_user->save();
        }
    }
}
