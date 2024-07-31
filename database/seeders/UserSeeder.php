<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $usersData =
            [
                [
                    'username' => 'marco',
                    'email' => 'm@gmail.com',
                    'password' => '12345678'
                ],
                [
                    'username' => 'giulia',
                    'email' => 'g@gmail.com',
                    'password' => '12345678'
                ],
                [
                    'username' => 'romeo',
                    'email' => 'r@gmail.com',
                    'password' => '12345678'
                ],
            ];
        foreach ($usersData as $userData) {
            $user = new User();
            $user->name = $userData['username'];
            $user->email = $userData['email'];
            $user->password = bcrypt($userData['password']);
            $user->save();
        }
    }
}
