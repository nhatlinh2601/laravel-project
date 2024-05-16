<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;
use Illuminate\Support\Facades\Redirect;
use App\Models\Lesson;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($id_lesson)
    {
      
       $lesson=Lesson::find($id_lesson);
      
        if (!$lesson) {
            return response()->json(['error' => 'Lesson not found'], 404);
        }
        $videos = $lesson->videos;
        if (!$videos) {
            return response()->json(['error' => 'Videos not found'], 404);
        }
        $course = $lesson->course;
        $teacher = $course->teacher;
        return response()->json([
            'videos' => $videos,
            'lesson' => $lesson,
            'course' => $course,
            'teacher' => $teacher
        ]);
    }

    public function getTest($id_lesson){
        $lesson=Lesson::find($id_lesson);
      
        if (!$lesson) {
            return response()->json(['error' => 'Lesson not found'], 404);
        }
        
        $test=$lesson->test;
        if(!$test){
            return response()->json(['error' => 'Test not found'], 404);
        }
        $questions=$test->questions;
        if(!$questions){
            return response()->json(['error' => 'Questions not found'], 404);
        }
        return response()->json([
            'test' => $test,
            'questions' => $questions,
        ]);

    }

    public function updateStatus($id)
{
    $lesson = Lesson::find($id);
    $lesson->status = 1; 
    $lesson->save();


    return response()->json([
        'lesson' => $lesson,
    ]);
}


}
