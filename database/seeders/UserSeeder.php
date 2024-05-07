<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $groups=Group::all();

        $users = [
            [

                "name" => "user",
                "email" => "user@gmail.com",
                "group_id" => $groups->random()->id,
                "password" => Hash::make("123456"),
                "img_path" => "client/images/review/r-3.jpg"
            ],
            [

                "name" => "user 02",
                "email" => "user02@gmail.com",
                "group_id" => $groups->random()->id,
                "password" => Hash::make("123456"),
                "img_path" => "client/images/review/r-2.jpg"
            ],
            [

                "name" => "user 03",
                "email" => "user03@gmail.com",
                "group_id" => $groups->random()->id,
                "password" => Hash::make("123456"),
                "img_path" => "client/images/review/r-3.jpg"
            ],
            [

                "name" => "user 04",
                "email" => "user04@gmail.com",
                "group_id" => $groups->random()->id,
                "password" => Hash::make("123456"),
                "img_path" => "client/images/review/r-1.jpg"
            ],
            [

                "name" => "user 05",
                "email" => "user05@gmail.com",
                "group_id" => $groups->random()->id,
                "password" => Hash::make("123456"),
                "img_path" => "client/images/review/r-2.jpg"
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'group_id' => $user['group_id'],
                    'password' => $user['password'],
                ]
            );
        }
    }
}
