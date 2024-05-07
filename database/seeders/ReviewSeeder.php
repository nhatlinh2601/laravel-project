<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseReviews;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\LessonReviews;
use App\Models\Post;
use App\Models\PostReviews;
use App\Models\Review;
use App\Models\Teacher;
use App\Models\TeacherReviews;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all(); 
        $lessons = Lesson::all(); 
        $courses = Course::all(); 
        $teachers = Teacher::all(); 
        $posts=Post::all();

        foreach ($lessons as $lesson) {
            for ($i = 1; $i <= 5; $i++) {
                $student = $students->random(); // Get a random student for the review

                LessonReviews::updateOrCreate([
                    'comment' => 'This is a review for lesson ' . $lesson->id,
                    'stars' => rand(1, 5),
                    'student_id' => $student->id,
                    'lesson_id' => $lesson->id,
                ]);
            }
        }

        foreach ($courses as $course) {
            for ($i = 1; $i <= 5; $i++) {
                $student = $students->random(); // Get a random student for the review

                CourseReviews::updateOrCreate([
                    'comment' => 'This is a review for course ' . $course->id,
                    'stars' => rand(1, 5),
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                ]);
            }
        }

        foreach ($posts as $post) {
            for ($i = 1; $i <= 5; $i++) {
                $student = $students->random(); // Get a random student for the review

                PostReviews::updateOrCreate([
                    'comment' => 'This is a review for post ' . $post->id,
                    'stars' => rand(1, 5),
                    'student_id' => $student->id,
                    'post_id' => $post->id,
                ]);
            }
        }

        foreach ($teachers as $teacher) {
            for ($i = 1; $i <= 5; $i++) {
                $student = $students->random(); // Get a random student for the review

                TeacherReviews::updateOrCreate([
                    'comment' => 'This is a review for teacher ' . $teacher->id,
                    'stars' => rand(1, 5),
                    'student_id' => $student->id,
                    'teacher_id' => $teacher->id,
                ]);
            }
        }
    }
}
