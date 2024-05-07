<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $courses = Course::all();
        $students = Student::all();

        foreach (range(1, 10) as $index) {
            Cart::create([
                'course_id' => $courses->random()->id,
                'student_id' => $students->random()->id,
            ]);
        }
    }
}
