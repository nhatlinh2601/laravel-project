<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    public static function getReviewByCourse($id_course, $perPage)
    {
        $reviews = DB::table('reviews')
            ->join('lessons', 'reviews.lesson_id', '=', 'lessons.id')
            ->join('courses', 'courses.id', '=', 'lessons.course_id')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*', 'courses.id AS course_id', 'users.name AS user_name', 'users.img_path AS user_img')
            ->where('course_id', '=', $id_course)
            ->paginate($perPage);
    
        return $reviews;
    }
    
}
