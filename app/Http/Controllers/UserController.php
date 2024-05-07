<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function viewProfile()
    {
        if (Auth::user()) {
            return view("pages.client.profile");
        } else {
            return redirect()->route("login");
        }
    }
    public function editProfile(User $user, Request $request)
    {

        $request->validate(
            [
                'name' => 'required|string|',
                'email' => 'required|string|email',
                'image' => 'image'
            ],
            [
                'required' => ':attribute bắt buộc phải nhập.',
                'email' => ':attribute không đúng định dạng.',
                'string' => ':attribute phải là kí tự.',
                'min' => ':attribute phải có ít nhất :min kí tự.',
                'image' => 'File không hợp lệ. Vui lòng thử lại'
            ],
            [
                'name' => 'Họ tên',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'image' => 'Hình ảnh'
            ]
        );

        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('img/users', 'public');
            $user->image_path=$imagePath;
        }
        $user->name = $request->name;
        if (!empty($user->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return back()->with('notice', 'Cập nhật thông tin thành công');
    }
}
