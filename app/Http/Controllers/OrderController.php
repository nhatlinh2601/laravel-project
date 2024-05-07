<?php

namespace App\Http\Controllers;

use App\Events\NewOrderReceived;
use App\Models\Cart;
use App\Models\Course;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{
    public function checkAuth(){
        $user = Auth::guard('student')->user();
    }
    
    //     if (!$user) {
    //         return redirect()->route('login');
    //     }
    // }
    public function payment(Course $course)
    {
        $user = Auth::guard('student')->user();
    
        if (!$user) {
            return redirect()->route('login');
        }
        return view('pages.client.payment', compact('course'));
    }


    public function cartControlPayment(Request $request)
    {
        $user = Auth::guard('student')->user();
    
            if (!$user) {
                return redirect()->route('login');
            }
        $coursesSelected = $request->input('courses', []);
        $courses = Course::whereIn('id', $coursesSelected)->get();
        $selectedCoursesPrices = Course::whereIn('id', $coursesSelected)->pluck('sale_price');
        $totalPrice = $selectedCoursesPrices->sum();

        return view('pages.client.payment', compact('courses', 'totalPrice'));
    }

    public function postPayment(Course $course)
    {

        $user = Auth::guard('student')->user();
    
        if (!$user) {
            return redirect()->route('login');
        }
        $order = new Order();
        $order->student_id = Auth::guard('student')->user()->id;
        $order->total = $course->sale_price;
        $order->save();

        $order_detail = new OrderDetail();
        $order_detail->order_id = $order->id;
        $order_detail->course_id = $course->id;
        $order_detail->price = $course->sale_price;
        $order_detail->save();

        $notification = new Notification();
        $notification->content = Auth::guard('student')->user()->name . '      vừa mua khóa học      ' . $course->name;
        $notification->image_path = $course->image_path;
        $notification->save();


        event(new NewOrderReceived(Auth::guard('student')->user(), $course));
        return view('pages.client.thankyou');
    }
    public function postCartPayment(Request $request)
    {
        $user = Auth::guard('student')->user();
    
        if (!$user) {
            return redirect()->route('login');
        }
        $coursesSelected = $request->input('courses', []);
        $courses = Course::whereIn('id', $coursesSelected)->get();
        $selectedCoursesPrices = Course::whereIn('id', $coursesSelected)->pluck('sale_price');
        $totalPrice = $selectedCoursesPrices->sum();

        $order = new Order();
        $order->student_id = Auth::guard('student')->user()->id;
        $order->total = $totalPrice;
        $order->save();


        foreach ($courses as $course) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->course_id = $course->id;
            $order_detail->price = $course->sale_price;
            $order_detail->save();

            $notification = new Notification();
            $notification->content = Auth::guard('student')->user()->name . '      vừa mua khóa học      ' . $course->name;
            $notification->image_path = $course->image_path;
            $notification->save();

            $cart_done=Cart::where('course_id',$course->id)->where('student_id',Auth::guard('student')->user()->id);
            $cart_done->delete();
        }


        

      


        event(new NewOrderReceived(Auth::guard('student')->user(), $courses));
        return view('pages.client.thankyou');
    }
}
