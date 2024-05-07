<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseReviews;
use App\Models\CourseStudent;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->whereIn('id', $request->category);
            });
        }

        if (isset($request->min) && $request->min != null) {
            $query->where('price', '>=', $request->min);
        }
        if (isset($request->max) && $request->max != null) {
            $query->where('price', '<=', $request->max);
        }

        $courses = $query->get();

        $categories = Category::all();

        return response()->json([
            'courses' => $courses,
        ]);
    }

    public function show($id)
    {
        $course = Course::with(['lessons.videos'])->find($id);

        if (!$course) {
            return response()->json([
                'error' => 'Course not found'
            ], 404);
        }

        $coursesOfStudent = [];

        $firstLesson = $course->lessons->first()->videos->first();

        if (Auth::guard('student')->user()) {
            $coursesOfStudent = Auth::guard('student')->user()->courses;
        }

        $coursesByCategory = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->get();

        $latestCourse = Course::where('id', '!=', $course->id)
            ->inRandomOrder()
            ->first();

        $lessons = $course->lessons;
        $reviews = CourseReviews::where('course_id', $id)
            ->take(5)
            ->get();

        return response()->json([
            'course' => $course,
            'coursesByCategory' => $coursesByCategory,
            'lessons' => $lessons,
            'reviews' => $reviews,
            'firstLesson' => $firstLesson
        ]);
    }

    public function coursesByCategoryID($id)  {
        $category=Category::find($id);
        $courses=$category->courses;
        return response()->json(
            ['coursesByCate' => $courses,
            
            ]
        );
    }

    public function popularCourse(){
        $popularCourseIds = CourseStudent::select('course_id', DB::raw('COUNT(*) as student_count'))
            ->groupBy('course_id')
            ->orderByDesc('student_count')
            ->pluck('course_id')
            ->toArray();

        // Lấy thông tin chi tiết về các khóa học phổ biến
        $popularCourses = Course::whereIn('id', $popularCourseIds)->get();

        // Trả về dữ liệu dưới dạng response API JSON
        return response()->json([
            'Popular Courses' => $popularCourses
        ]);
   
        
    }

    public function recommendCourse(){
        $randomCourses = Course::inRandomOrder()->take(5)->get();


        return response()->json([
            'Recommend Courses' => $randomCourses
        ]);
   
        
    }
}

