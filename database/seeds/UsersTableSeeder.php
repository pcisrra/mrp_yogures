<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$8TrvZtt4whdMltZQODZiOejQJXtoLbtu.9hRuuZoFJ6mUo6AkCuIi',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
