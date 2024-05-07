<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();

        foreach ($courses as $course) {
            for ($i = 1; $i < 5; $i++) {
                $lessonName = 'Bắt đầu với ' . $course->name . ' - Lesson ' . $i;

                Lesson::updateOrCreate(
                    ['name' => $lessonName],
                    [
                        'name' => $lessonName,
                        'description' => 'Tìm hiểu cơ bản về ' . $course->name . ' - Lesson ' . $i,
                        'durations' => rand(10, 60),
                        'position' => rand(1, 10),
                        'views' => rand(100, 1000),
                        'course_id' => $course->id
                    ]
                );
            }
        }
    }
}
