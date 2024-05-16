<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
use App\Models\CourseStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        } else {
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

    // public function logout(Request $request)
    // {
    //     $request->user()->currentAccessToken()->delete();

    //     return response()->json(['message' => 'Logged out successfully'], 200);
    // }

    public function profile($id)
    {
        $user = Student::find($id);
        if (!$user) {
            return response()->json(['error' => 'Student not found'], 404);
        }
        return response()->json($user, 200);
    }


    public function update(Request $request, $id)
    {
        $user = Student::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $request->validate([
            'name' => 'string',
            'password' => 'nullable|string|min:6',
            'email' => 'string|email|max:255'
        ]);

        // Cập nhật thông tin người dùng
        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('password') && $request->password != "") {
            $user->password = Hash::make($request->password);
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        $user->save();

        return response()->json(['user' => $user], 200);
    }

    public function myCourses($userID)
    {

        $myCourses = CourseStudent::where('student_id', $userID)->pluck('course_id')->toArray();


        $coursesDetail = Course::whereIn('id', $myCourses)->get();

        return response()->json([
            'My Courses' => $coursesDetail
        ]);
    }

    public function isMyCourses($userID, $courseID)
    {

       
        $myCourses = CourseStudent::where('student_id', $userID)->pluck('course_id')->toArray();
        $isMyCourse = in_array($courseID, $myCourses);

        return response()->json([
            'IsMyCourse' => $isMyCourse
        ]);
    }

    public function isMyCart($userID, $courseID)
    {

    
        $myCourses = Cart::where('student_id', $userID)->pluck('course_id')->toArray();
        $isMyCart = in_array($courseID, $myCourses);

        return response()->json([
            'IsMyCart' => $isMyCart
        ]);
    }
}
