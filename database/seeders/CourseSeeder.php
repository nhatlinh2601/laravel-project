<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Teacher;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers=Teacher::all();
        $categories=Category::all();
        $courses = [
            [   
                "name" => 'HTML and CSS for beginer',
                "detail" => 'This course is designed for beginners who want to learn HTML and CSS. It covers the basics of HTML tags, CSS selectors, and styling web pages.',
                "image_path" => 'img/courses/cu-1.jpg',
                "price" => '1000000',
                "sale_price" => '899000',
                "teacher_id" => $teachers->random()->id,
                "category_id" => $categories->random()->id
            ],
            [    
                "name" => 'C++ from basic to advanced',
                "detail" => 'This course will help you learn the steps to improve argorithm and structure in C++',
                "image_path" => 'img/courses/cu-2.jpg',
                "price" => '1500000',
                "sale_price" => '900000',
                "teacher_id" => $teachers->random()->id,
                "category_id" => $categories->random()->id
            ],

            [   
                "name" => 'Web Development with JavaScript and Node.js',
                "detail" => 'Learn to build robust and scalable web applications using JavaScript.This is a popular web development stack.',
                "image_path" => 'img/courses/cu-3.jpg',
                "price" => '1700000',
                "sale_price" => '0',
                "teacher_id" => $teachers->random()->id,
                "category_id" => $categories->random()->id
            ],
            [    
                "name" => 'NodeJS And ExpressJS',
                "detail" => 'Learn to how to use NodeJS And ExpressJS and built the project',
                "image_path" => 'img/courses/cu-4.jpg',
                "price" => '2000000',
                "sale_price" => '1200000',
                "teacher_id" => $teachers->random()->id,
                "category_id" => $categories->random()->id
            ],
            [    
                "name" => 'Mastering React.js for Frontend Web Development',
                "detail" => 'Learn to build fast and efficient web applications with React.js, a popular JavaScript library for building user interfaces.',
                "image_path" => 'img/courses/cu-5.jpg',
                "price" => '0',
                "sale_price" => '0',
                "teacher_id" => $teachers->random()->id,
                "category_id" => $categories->random()->id
            ]

            
        ];
        foreach ($courses as $course) {
            Course::updateOrCreate(['name' => $course['name']], $course);
        }
        
    }
}
