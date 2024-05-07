<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'courses';

   
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class); // Corrected to reference the Teacher model
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public static function getCoursePaginated($query, $perPage)
    {
        // Use the provided $query instance instead of creating a new one
        $courses = $query
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->join('teachers', 'courses.teacher_id', '=', 'teachers.id')
            ->select('courses.*', 'categories.name AS cate_name', 'teachers.name AS teacher_name', 'teachers.description AS teacher_des', 'teachers.image_path AS teacher_img')
            ->paginate($perPage);
    
        return $courses;
    }
  
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(CourseReviews::class);
    }
    public function detail(): HasOne{
        return $this->hasOne(OrderDetail::class);
       }

       public function students()
    {
        return $this->belongsToMany(Student::class, 'courses_students', 'course_id', 'student_id');
    }


    public static function getCoursesForFree()
    {
        $courses = Course::join('teachers', 'courses.teacher_id', '=', 'teachers.id')
            ->select('courses.*', 'teachers.name AS teacher_name', 'teachers.image_path AS teacher_img')
            ->where('courses.sale_price', 0)
            ->get();
        return $courses;
    }

    public static function getPaidCourse()
    {
        $courses = Course::join('teachers', 'courses.teacher_id', '=', 'teachers.id')
            ->select('courses.*', 'teachers.name AS teacher_name', 'teachers.image_path AS teacher_img')
            ->where('price', '!=', 0)->Where('sale_price', '!=', 0)
            ->get();
        return  $courses;
    }

    public static function getCourseById($id)
    {
        $course = DB::table('courses')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->join('teachers', 'courses.teacher_id', '=', 'teachers.id')
            ->select('courses.*', 'categories.name AS cate_name', 'teachers.name AS teacher_name', 'teachers.description AS teacher_des', 'teachers.image_path AS teacher_img')
            ->where('courses.id', '=', $id)
            ->first();

        return $course;
    }

    public static function getCourseByCategories($id_cate)
    {
        $courses = DB::table('courses')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->join('teachers', 'courses.teacher_id', '=', 'teachers.id')
            ->select('courses.*', 'categories.name AS cate_name', 'teachers.name AS teacher_name', 'teachers.description AS teacher_des', 'teachers.image_path AS teacher_img')
            ->where('courses.category_id', '=', $id_cate)
            ->get();

        return $courses;
    }

    public static function getCourseRandom($id_course)
    {
        $courses = Course::where('id', '!=', $id_course)->take(3)->get();
        return $courses;
        
    }

    public static function getCountCourse()
    {
        $count = Course::all()->count();
        return $count;
    }

    public static function getLessonByCourse($id_course)
    {
        $lessons = DB::table('lessons')
            ->join('courses', 'courses.id', '=', 'lessons.course_id')
            ->select('lessons.*')
            ->where('lessons.course_id', '=', $id_course)
            ->orderBy('id', 'asc')
            ->get();

        return $lessons;
    }

    public static function getCouserAjax(){
        $couses = Course::select('name')->get();
        return $couses;
    }

    public static function getCourseByName($name){
        $courses = DB::table('courses')
        ->join('categories', 'courses.category_id', '=', 'categories.id')
        ->join('teachers', 'courses.teacher_id', '=', 'teachers.id')
        ->select('courses.*', 'categories.name AS cate_name', 'teachers.name AS teacher_name', 'teachers.description AS teacher_des', 'teachers.image_path AS teacher_img')
        ->where('courses.name', 'like', '%' . $name . '%')
        ->get();

        return $courses;
    }

    public static function getCourseName($id){
        $course_name = DB::table('courses')
        ->select('courses.name')
        ->where('courses.id','=',$id)
        ->first();

        return $course_name;
    }
}
