<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('student')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('student')->user();
            $token = $user->createToken('StudentToken')->plainTextToken;
            return response()->json(['user' => $user, 'token' => $token], 200);
        }else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:6',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = new Student();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        $token = $user->createToken('StudentToken')->plainTextToken;
    
        return response()->json(['user' => $user, 'token' => $token], 201);
    }
    
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function profile(Request $request)
    {
        return response()->json($request->user(), 200);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'nullable|string|min:6',
            'image' => 'nullable|image',
        ]);

        $user = $request->user();

        $user->name = $request->name;

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->has('image')) {
            // Xử lý lưu ảnh và cập nhật đường dẫn
            $user->image_path = $request->file('image')->store('images', 'public');
        }

        $user->save();

        return response()->json($user, 200);
    }
}
