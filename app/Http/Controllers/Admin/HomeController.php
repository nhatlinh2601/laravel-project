<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Order;
use App\Models\Post;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    public function index()
    {


        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard_admin');
        } elseif ($user->hasRole('teacher')) {
            return redirect()->route('admin.dashboard_teacher');
        }
    }

    public function dashboard_admin()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $currentYear = Carbon::now()->format('Y');

        $dailyOrders = Order::where('created_at', 'like', $currentMonth . '%')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->get();


        for ($date = 1; $date <= 30; $date++) {
            if ($date < 10) {
                $date = '0' . $date;
            }
            $order = $dailyOrders->firstWhere('date', $currentMonth . '-' . $date);
            $dailyOrdersData[] = [
                'date' => $date,
                'count' => $order ? $order->count : 0,
            ];
        }

        $monthlyOrders = Order::whereYear('created_at', $currentYear)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        $monthOrdersData = [];
        for ($month = 1; $month <= 12; $month++) {
            $order = $monthlyOrders->firstWhere('month', $month);
            $monthOrdersData[] = [
                'month' => $month,
                'count' => $order ? $order->count : 0,
            ];
        }

        $orders = Order::where('status', 0)->orderBy('created_at', 'desc')->paginate(10);
        $orderCount = Order::count();
        $postCount = Post::count();
        $userCount = User::count();
        $courseCount = Course::count();

        return view('pages.backend.dashboard', compact('dailyOrdersData', 'monthOrdersData', 'orders', 'orderCount', 'postCount', 'userCount', 'courseCount'));
    }

    public function dashboard_teacher()
    {

        $teacher_id = Auth::user()->id;
        $teacher = Teacher::where('user_id', $teacher_id)->first();
        $courseCount = $teacher->courses()->count();


        $results = DB::table('teachers')
            ->leftJoin('courses', 'teachers.id', '=', 'courses.teacher_id')
            ->leftJoin('courses_students', 'courses.id', '=', 'courses_students.course_id')
            ->select('teachers.name AS teacher_name', 'courses.name AS course_name', DB::raw('COUNT(courses_students.student_id) AS student_count'))
            ->where('teachers.id', '=', $teacher_id)
            ->groupBy('teachers.name', 'courses.name')
            ->get();

        $chartData = [];

        foreach ($results as $course) {
            $chartData[] = [
                'course_name' => $course->course_name,
                'student_count' => $course->student_count ,
            ];
        }


        $userCount = CourseStudent::join('courses', 'courses_students.course_id', '=', 'courses.id')
            ->join('teachers', 'teachers.id', '=', 'courses.teacher_id')
            ->join('students', 'students.id', '=', 'courses_students.student_id')
            ->where('teachers.id', '=', $teacher->id)
            ->count();





        return view('pages.backend.dashboard_teacher', compact('userCount', 'courseCount', 'chartData'));
    }
}
