<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search() {
        $data =[];
        $courses =  Course::getCouserAjax();
        $posts = Post::postByAjax();

        foreach ($courses as $course) {
            $data[] = [
                'label' => $course['name'],
                'category' => 'Course',
            ];
        }

        foreach ($posts as $post){
            $data[] = [
                'label' => $post['title'],
                'category' => 'Post',
            ];
        }


       return  $data;
    }

    public function search_product(Request $request){
        $keyword = $request->search;
        if ($keyword != ''){
            $courses = Course::getCourseByName($keyword);
            $posts = Post::getPostByName($keyword);
            if ($courses!= '' || $posts != ''){
                return view('pages.client.result_search', [
                    'courses' => $courses,
                    'posts' => $posts
                ]);
            }
            else {
                return redirect()->back()->with('status', 'No products matched your search');
            }
        }else{
            return redirect()->back();
        }
    }

    public function coursesBySearchKey(Request $request)
    {
        $keyword = $request->search;

        if (!empty($keyword)) {
            $courses = Course::where('name', 'like', '%' . $keyword . '%')->get();

            if (!$courses->isEmpty()) {
                return response()->json([
                    'coursesBySearchKey' => $courses
                ], 200);
            } else {
                return response()->json([
                    'message' => 'No courses matched your search'
                ], 404);
            }
        } else {
            return response()->json([
                'message' => 'Please provide a search keyword'
            ], 400);
        }
    }
}
