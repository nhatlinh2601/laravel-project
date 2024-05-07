<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\User;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $students = [
            [
                "name" => "stu",
                "email" => "stu@gmail.com",
                "password" => Hash::make('123456') ,
            ],
            [
                "name" => "stu 02",
                "email" => "stu02@gmail.com",
                "password" => Hash::make('123456') ,
            ],
            [
                "name" => "stu 03",
                "email" => "stu03@gmail.com",
                "password" => Hash::make('123456') ,
            ],
        ];

        foreach ($students as $student) {
           
            Student::updateOrCreate(
                ['email' => $student['email']], // Điều kiện để tìm sinh viên
                [
                    'name' => $student['name'],
                    'password' => $student['password'],
                ]
            );
        }
    }
}

