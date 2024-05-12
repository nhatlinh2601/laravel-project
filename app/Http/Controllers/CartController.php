<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public static function index($id)
    {
        
        $user = Student::find($id);

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $cartItems = Cart::getCartByIdUser($id);

        $totalPrice = Cart::getTotalPrice($cartItems);

        return response()->json([
            'courses' => $cartItems,
            'total' => $totalPrice
        ], 200);
    }

    public function addToCart($userId, $courseId)
    {
        try {
            $course=Course::find($courseId);
            Cart::addToCart($userId, $courseId);
            return response()->json(['message-addToCart' => "'$course->name' add to cart successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['error-addToCart' => "Failed to add '$course->name' to cart"], 500);
        }
    }

    public function removeCartItem($userId, $courseId)
    {
        
        try {
            $course=Course::find($courseId);
            Cart::where('student_id', $userId)->where('course_id', $courseId)->delete();
            
            return response()->json(['message-remove' => "'$course->name' removed successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['error-remove' => "Failed to remove '$course->name'"], 500);
        }

    }

    public function updateTotal(Request $request)
    {
        $user = Auth::guard('student')->user();

        if (!$user) {
            return redirect()->route('login');
        }
        $total = $request->input('total');

        return response()->json(['success' => true, 'message' => 'Total updated successfully', 'totalprice' => $total]);
    }
}
