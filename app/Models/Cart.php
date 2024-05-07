<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Cart extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected $fillable = [
        'course_id',
        'student_id',
    ];

    protected $table = 'cart';
    public static function getCartByIdUser($id){
        $cart = DB::table('cart')
        ->join('students', 'cart.student_id', '=', 'students.id')
        ->join('courses', 'courses.id', '=', 'cart.course_id')
        ->select('courses.*')
        ->where('students.id', '=', $id)
        ->get();

        return $cart;
    }

    public static function removeCartItem($userId, $courseId)
    {
        DB::table('cart')->where('student_id', $userId)->where('course_id', $courseId)->delete();
    }


    public static function getTotalPrice($cartItems)
    {
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->sale_price;
        }
        return $totalPrice;
    }

    public static function addToCart($student_id, $courseId)
    {
        $cartItem = Cart::where('student_id', $student_id)->where('course_id', $courseId)->first();

        if ($cartItem) {
            session()->flash('info', 'Khóa học đã tồn tại trong giỏ hàng.');
        } else {
            Cart::create([
                'student_id' => $student_id,
                'course_id' => $courseId,
            ]);
        }
    }

    public static function countCourseFromCart($student_id){
        $result = Cart::select('student_id', DB::raw('COUNT(course_id) AS number_of_courses'))
        ->where('student_id', $student_id)
        ->groupBy('student_id')
        ->first();

        return ($result->number_of_courses ?? 0);
    }
}
