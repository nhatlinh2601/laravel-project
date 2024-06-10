<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\category;
use App\Models\Course;
use App\Models\Documentary;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LessonController extends Controller
{
    public function add(Course $course)
    {
        return view('pages.backend.lesson.add', compact('course'));
    }
    public function postAdd(Request $request, Lesson $lesson, Course $course, Documentary $documentary)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'detail' => 'required|string',
                'url' => 'required|string',
                'img_path' => 'required|string',
                
            ],
            [
                'required' => ':attribute bắt buộc phải nhập.',
                'string' => ':attribute phải là kí tự.',
            ],
            [
                'name' => 'Tên bài giảng',
                'detail' => 'Mô tả',
                'url' => 'Đường dẫn bài giảng',
                'img_path' => 'Đường dẫn hình ảnh',
            ]
        );



        $lesson->name = $request->name;
        $lesson->description = $request->detail;
        $lesson->url = $request->url;
        $lesson->image_path = $request->img_path;
        $lesson->course_id = $course->id;
        $lesson->save();
        if ($request->file) {
            $documentary->name = $lesson->name;
            $documentary->url = $request->file;
            $documentary->lesson_id = $lesson->id;
            $documentary->save();
        }
        return redirect()->route('admin.course.lesson.list', $course)->with('success', 'Thêm bài giảng thành công');
    }

    public function listLesson(Course $course)
    {

        $lessons = $course->lessons()->orderBy('id', 'asc')->paginate(6);
        return view('pages.backend.lesson.list', compact(['course', 'lessons']));
    }
    public function listLessonAjax(Course $course)
    {
        if (request()->ajax()) {
            $lessons = $course->lessons()->orderBy('id', 'asc')->paginate(6);
            return view('pages.backend.lesson.data', compact(['course', 'lessons']))->render();
        }
    }




    public function edit(Lesson $lesson)
    {
        $videos = $lesson->videos()->paginate(6);
        $documentaries= $lesson->documents;
        return view('pages.backend.lesson.edit', compact('lesson', 'documentaries'));
    }
    public function postEdit(Request $request, Lesson $lesson, Documentary $documentary)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'detail' => 'required|string',
            ],
            [
                'required' => ':attribute bắt buộc phải nhập.',
                'string' => ':attribute phải là kí tự.',
            ],
            [
                'name' => 'Tên bài giảng',
                'detail' => 'Mô tả',
            ]
        );



        $lesson->name = $request->name;
        $lesson->description = $request->detail;
        $lesson->save();
        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(storage_path('app/public/uploads'), $fileName);

            $documentary = Lesson::find($lesson->id)->documentary;
            if ($documentary) {
                $documentary->url = $fileName;
            } else {
                $documentary = new Documentary();

                $documentary->name = $lesson->name;
                $documentary->url = $fileName;
                $documentary->lesson_id = $lesson->id;
                $documentary->save();
            }


            $documentary->save();
        }
        return back()->with('success', 'Cập nhật bài giảng thành công');
    }

    public function delete(Lesson $lesson)
    {
        $lesson->delete();
        return back()->with('success', 'Xóa bài giảng thành công');
    }


    public function findLesson(Request $request)
    {
    }

    
}
