<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function add(Lesson $lesson)
    {
        $videos = $lesson->videos()->paginate(6);
        return view('pages.backend.video.add', compact('lesson', 'videos'));
    }
    public function postAdd(Lesson $lesson, Request $request, Video $video)
    {
        $request->validate(

            [
                'title' => 'required|string',
                'url_video' => 'required|string',
            ],
            [
                'required' => ':attribute bắt buộc phải nhập.',
                'string' => ':attribute phải là kí tự.',
            ],
            [
                'title' => 'Tiêu đề video',
                'url_video' => 'Đường dẫn URL',
            ]

        );

        $video->name = $request->title;
        $video->url = $request->url_video;
        $video->lesson_id = $lesson->id;
        $video->save();
        return back()->with('success', 'Thêm video thành công. ');
    }

    public function delete(Video $video)
    {
        $video->delete();
        return back()->with('success', 'Xóa video thành công. ');
    }

    public function postEditLesson(Lesson $lesson, Request $request, Video $video)
    {
        $request->validate(

            [
                'title' => 'required|string',
                'url_video' => 'required|string',
            ],
            [
                'required' => ':attribute bắt buộc phải nhập.',
                'string' => ':attribute phải là kí tự.',
            ],
            [
                'title' => 'Tiêu đề video',
                'url_video' => 'Đường dẫn URL',
            ]

        );

        $video->name = $request->title;
        $video->url = $request->url_video;
        $video->lesson_id = $lesson->id;
        $video->save();
        return back()->with('success', 'Thêm video thành công. ');
    }
}
