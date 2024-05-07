<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Post;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function add()
    {
    }
    public function postAdd(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'description' => 'required|string',
                'exp' => 'required|numeric',
                'image' => 'required|image'
            ],
            [
                'required' => ':attribute bắt buộc phải nhập.',
                'min' => ':attribute phải có ít nhất :min kí tự.',
                'unique' => ':attribute đã tồn tại',
                'string' => ':attribute phải là kí tự.',
                'numeric' => ':attribute phải là kiểu dữ liệu số.',
                'image' => 'File không hợp lệ. Vui lòng thử lại'
            ],
            [
                'name' => 'Họ tên',
                'description' => 'Mô tả',
                'exp' => 'Kinh nghiệm',
                'image' => 'Hình ảnh'
            ]
        );
    }


    public function listPost()
    {
        $categories = Category::all();
        $posts = Post::orderBy('id', 'asc')->paginate(6);
        return view('pages.backend.post.list', compact(['posts', 'categories']));
    }
    public function listPostAjax()
    {
        if (request()->ajax()) {
            $categories = Category::all();
            $posts = Post::orderBy('id', 'asc')->paginate(6);
            return view('pages.backend.post.data', compact(['posts', 'categories']))->render();
        }
    }

    public function detail(Post $post)
    {
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('pages.backend.post.edit', compact(['post', 'categories']));
    }
    public function postEdit(Request $request, Post $post)
    {
        $request->validate(
            [
                "post_title" => "required|string",
                'post_content' => "required|string",
                'category' => ['required', 'integer', function ($attribute, $value, $fail) {
                    if ($value === '0') return $fail('Vui lòng chọn danh mục');
                }]
            ],
            [
                'required' => ':attribute bắt buộc phải nhập.',
                'string' => ':attribute phải là kí tự.',
            ],
            [
                "post_title" => "Tiêu đề",
                'post_content' => "Nội dung",
            ]
        );


        if (auth()->check()) {
            $post->title = $request->post_title;
            $post->content = $request->post_content;
            $post->category_id = $request->category;
            $post->user_id = auth()->user()->id;
            $post->save();
            return redirect()->route('admin.post.index')->with('success', 'Cập nhật bài viết thành công.');
        } else {
            // Xử lý trường hợp người dùng chưa đăng nhập
            return redirect()->route('admin.login')->with('error', 'Bạn cần đăng nhập để đăng bài viết.');
        }
    }

    public function delete(Post $post)
    {
        if ($post->delete()) {
            return back()->with("success", "Xóa bài viết thành công");
        } else {
            return back()->with("error", "Đã có lỗi xảy ra. Vui lòng thử lại");
        }
    }



    public function findPost(Request $request)
    {
        $categories = Category::all();
        $search_key = $request->input('search_key');
        $category = $request->input('category');
        $categoryModel = Category::find($category);

        if ($categoryModel) {

            $posts = $categoryModel->posts()
                ->where(function ($query) use ($search_key) {
                    $query->where('title', 'LIKE', '%' . $search_key . '%');
                })
                ->paginate(6);

           
        } else {

            $posts = Post::where('title', 'LIKE', '%' . $search_key . '%')
                ->paginate(6);
           
        }
        return view('pages.backend.post.data', compact('posts', 'categories', 'categoryModel'))->render();
    }

    public function postByCategory(Request $request)
    {
        $categories = Category::all();
        $category = $request->input('category');
        $categoryModel = Category::find($category);

        if ($categoryModel) {
            $posts = $categoryModel->posts()->paginate(6);
        } else {
            $posts = Post::paginate(6);
        }
        return view('pages.backend.post.data', compact('categories', 'posts', 'categoryModel'))->render();
    }
}
