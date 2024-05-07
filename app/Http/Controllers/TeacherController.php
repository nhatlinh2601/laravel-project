<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::getAllTeacherPag(8);
        return view("pages.client.teachers", [
            'teachers' => $teachers,
        ]);
    }

    public function teacherDetail($id){
        $coursesByTeacher = Teacher::getCourseByTeacher($id);
        $teacher = Teacher::getTeacherByTeacherId($id); 
        return view("pages.client.teacher-detail", [
            'teacher' => $teacher,
            'coursesByTeacher' => $coursesByTeacher
        ]);
    }
}
