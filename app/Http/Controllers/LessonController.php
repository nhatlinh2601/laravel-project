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
    public function index($id_video ){
        
       $video=Video::find($id_video);
       $lesson = $video->lesson;
       $course = $lesson->course;
     
        return view ('pages.client.lesson', compact('lesson','course','video'));
    }


}
