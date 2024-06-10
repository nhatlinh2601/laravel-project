<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;
use Illuminate\Support\Facades\Redirect;
use App\Models\Lesson;
use App\Models\ReplyComment;
use App\Models\Student;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($id_lesson)
    {

        $lesson = Lesson::find($id_lesson);

        if (!$lesson) {
            return response()->json(['error' => 'Lesson not found'], 404);
        }
        $videos = $lesson->videos;
        if (!$videos) {
            return response()->json(['error' => 'Videos not found'], 404);
        }
        $course = $lesson->course()->with("lessons")->get()->first();
      //  $teacher = $course->teacher;
        return response()->json([
            'videos' => $videos,
            'lesson' => $lesson,
            'course' => $course,
        //    'teacher' => $teacher
        ]);
    }

    public function getTest($id_lesson)
    {
        $lesson = Lesson::find($id_lesson);

        if (!$lesson) {
            return response()->json(['error' => 'Lesson not found'], 404);
        }

        $test = $lesson->test;
        if (!$test) {
            return response()->json(['error' => 'Test not found'], 404);
        }
        $questions = $test->questions()->with('answers')->get();
        if (!$questions) {
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

    public function getDocuments($id_lesson)
    {
        $lesson = Lesson::find($id_lesson);
        $documents = $lesson->documents;

        if (!$documents) {
            return response()->json(['error' => 'Documents not found'], 404);
        }

        return response()->json([
            'documents' => $documents
        ]);
    }

    public function getComments($id_lesson)
    {
        $lesson = Lesson::find($id_lesson);

        // Load comments with related student data
        $comments = $lesson->comments()->with('student')->with('replyComments')->orderBy("created_at", "desc")->get();
        $totalComments = 0;
        foreach ($comments as $comment) {
            // Count the main comment
            $totalComments++;
    
            // Count the reply comments
            if ($comment->replyComments) {
                $totalComments += $comment->replyComments->count();
            }
        }
        return response()->json([
            'comments' => $comments,
            'totalComments' => $totalComments,
        ]);
    }

    public function getAllReplyComments($id_lesson)
    {
       
        // Load comments with related student data
        $comments = ReplyComment::where("lesson_id",$id_lesson)->get();
        
        return response()->json([
            'allReplyComments' => $comments,
        ]);
    }




    public function addComment(Request $request, $id_lesson, $id_user)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        try {

            $comment = new Comment();
            $comment->content = $request->content;
            $comment->student_id = $id_user;
            $comment->lesson_id = $id_lesson;


            $comment->save();





            return response()->json(['comment' => $comment], 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Failed to add comment'], 500);
        }
    }

    
    public function addReplyComment(Request $request, $id_comment, $id_user)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        try {

            $comment = new ReplyComment;
            $comment->content = $request->content;
            $comment->student_id = $id_user;
            $comment->comment_id = $id_comment;
            $comment->save();
            return response()->json(['replyComment' => $comment], 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Failed to add comment'], 500);
        }
    }

    public function isMyComment($id_user, $id_comment)
    {


        $myComments = Comment::where('student_id', $id_user)->pluck('id')->toArray();
        $isMyComment = in_array($id_comment, $myComments);

        return response()->json([
            'IsMyComment' => $isMyComment
        ]);
    }

    public function deleteComment($id_comment)
    {

        try {
            $comment = Comment::find($id_comment);
            $comment->delete();

            return response()->json(['message-remove' => "Comment removed successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['error-remove' => "Failed to remove "], 500);
        }
    }
    public function deleteReplyComment($id_comment)
    {

        try {
            $comment = ReplyComment::find($id_comment);
            $comment->delete();

            return response()->json(['message-remove' => "Comment removed successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['error-remove' => "Failed to remove "], 500);
        }
    }

    public function getReplyComments($id_comment)
    {
        $comment =  Comment::find($id_comment);

        // Load comments with related student data
        $replyComments = $comment->replyComments()->with('student')->get();

        return response()->json([
            'replyComments' => $replyComments,
        ]);
    }

    public function getCommentById($id_comment)
    {
        $comment = Comment::with(['student', 'replyComments.student'])->find($id_comment);

        if ($comment) {
            return response()->json([
                'comment' => $comment,
            ]);
        } else {
            return response()->json([
                'message' => 'Comment not found',
            ], 404);
        }
    }
}
