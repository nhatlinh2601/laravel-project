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
                "image_path" => 'https://th.bing.com/th/id/OIP.qkKvHOFmiRTyE_w3eYuhnwHaEK?w=800&h=450&rs=1&pid=ImgDetMain',
                "price" => '10',
                "sale_price" => '8.9',
                "teacher_id" => $teachers->random()->id,
                "category_id" => $categories->random()->id
            ],
            [    
                "name" => 'C++ from basic to advanced',
                "detail" => 'This course will help you learn the steps to improve argorithm and structure in C++',
                "image_path" => 'https://i.morioh.com/210619/4f472a65.webp',
                "price" => '15',
                "sale_price" => '9',
                "teacher_id" => $teachers->random()->id,
                "category_id" => $categories->random()->id
            ],

            [   
                "name" => 'Web Development with JavaScript and Node.js',
                "detail" => 'Learn to build robust and scalable web applications using JavaScript.This is a popular web development stack.',
                "image_path" => 'https://th.bing.com/th/id/OIP.p93iVAXR-VjxTk94pqLUQQHaEo?w=696&h=436&rs=1&pid=ImgDetMain',
                "price" => '17',
                "sale_price" => '14',
                "teacher_id" => $teachers->random()->id,
                "category_id" => $categories->random()->id
            ],
            [    
                "name" => 'NodeJS And ExpressJS',
                "detail" => 'Learn to how to use NodeJS And ExpressJS and built the project',
                "image_path" => 'https://cdn-media-1.freecodecamp.org/images/1*DF0g7bNW5e2z9XS9N2lAiw.jpeg',
                "price" => '20',
                "sale_price" => '12',
                "teacher_id" => $teachers->random()->id,
                "category_id" => $categories->random()->id
            ],
            [    
                "name" => 'Mastering React.js for Frontend Web Development',
                "detail" => 'Learn to build fast and efficient web applications with React.js, a popular JavaScript library for building user interfaces.',
                "image_path" => 'https://th.bing.com/th/id/R.796523382777357d18ba619048335003?rik=hi%2f%2bPd07IRqj%2fA&pid=ImgRaw&r=0',
                "price" => '25',
                "sale_price" => '21',
                "teacher_id" => $teachers->random()->id,
                "category_id" => $categories->random()->id
            ]

            
        ];
        foreach ($courses as $course) {
            Course::updateOrCreate(['name' => $course['name']], $course);
        }
        
    }
}
