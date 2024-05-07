<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public static function index($id)
    {
        $user = Auth::guard('student')->user();

        if (!$user) {
            return redirect()->route('login');
        }
        $cartItems = Cart::getCartByIdUser($id);
        $totalPrice = Cart::getTotalPrice($cartItems);

        return view('pages.client.cart', [
            'courses' => $cartItems,
            'total' =>  $totalPrice
        ]);
    }

    public function addToCart($courseId)
    {
        $user = Auth::guard('student')->user();

        if (!$user) {
            return redirect()->route('login');
        }
        Cart::addToCart(Auth::guard('student')->user()->id, $courseId);

        return redirect()->back();
    }

    public function removeCartItem($courseId)
    {
        $user = Auth::guard('student')->user();

        if (!$user) {
            return redirect()->route('login');
        }
        Cart::removeCartItem(Auth::guard('student')->user()->id, $courseId);
        session()->flash('success', 'Khóa học đã được xóa khỏi giỏ hàng.');

        return redirect()->back();
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
