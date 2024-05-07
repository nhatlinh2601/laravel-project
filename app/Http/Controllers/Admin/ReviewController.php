<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\category;
use App\Models\Course;
use App\Models\CourseReviews;
use App\Models\Lesson;
use App\Models\LessonReviews;
use App\Models\PostReviews;
use App\Models\Review;
use App\Models\Teacher;
use App\Models\TeacherReviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ReviewController extends Controller
{


    public function listReview()
    {
        $reviews = CourseReviews::orderBy('id', 'asc')->paginate(6);
        return view('pages.backend.review.list', compact('reviews'));
    }
    public function listReviewAjax()
    {
        if (request()->ajax()) {
            $reviews = CourseReviews::orderBy('id', 'asc')->paginate(6);
            return view('pages.backend.review.data', compact('reviews'))->render();
        }
    }

    public function postByCategory(Request $request){
        
        $category = $request->input('category');
        $column='';
        $attribute='';
        $table='';
        
        switch ($category) {
            case '1': // courses
                $reviews=CourseReviews::paginate(6);
                $column="Khóa học";
                $attribute='name';
                $table='course';
                break;
            case '2': // teachers
                $reviews=TeacherReviews::paginate(6);
                $column="Giáo viên";
                $attribute='name';
                $table='teacher';
                break;
            case '3': // posts
                $reviews=PostReviews::paginate(6);
                $column="Bài viết";
                $attribute='title';
                $table='post';
                break;
            case '4': // lessons
                $reviews=LessonReviews::paginate(6);
                $column="Bài giảng";
                $attribute='name';
                $table='lesson';
                break;
            
            default:
                $reviews=CourseReviews::paginate(6);
                break;
        }

     
       

        // if ($category==0) {
            
        // } 
        return view('pages.backend.review.data', compact('category', 'reviews','column','table','attribute'))->render();
    }

    public function detail()
    {
    }


    public function edit()
    {
    }
    public function postEdit(Request $request,)
    {
    }

    public function delete(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.review.list')->with('Xóa đánh giá thành công.');
    }


   
}
