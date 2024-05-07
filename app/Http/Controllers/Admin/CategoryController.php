<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function add()
    {
        return view("pages.backend.categories.add");
    }
    public function postAdd(Request $request)
    {
        $request->validate(
            [
                "name" => "required|string|unique:categories",
            ],
            [
                'required' => ':attribute bắt buộc phải nhập.',
                'unique' => ':attribute đã tồn tại'
            ],
            [
                'name' => 'Tên danh mục',
            ]
        );
        $category = new Category();
        $category->name = $request->name;
        $category->user_id = Auth::user()->id;
        if ($request->public == 'on') {
            $category->public = 1;
        }
        if ($request->status == 'on') {
            $category->status = 1;
        }
        $category->save();
        return redirect()->route('admin.category.list')->with('success', 'Thêm mới danh mục thành công');
    }

    public function listCategory()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(6);

        return view("pages.backend.categories.list", compact("categories"));
    }
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        
        return response()->json(['categories' => $categories], 200);
    }
    public function listCategoryAjax()
    {

        if (request()->ajax()) {
            $categories = Category::orderBy('id', 'asc')->paginate(6);

            return view("pages.backend.categories.data", compact("categories"))->render();
        }
    }

    public function view(Category $category)
    {
        $courses = $category->courses()->paginate(6);
        return view("pages.backend.categories.courses-list", compact(["category", "courses"]));
    }


    public function edit(Category $category)
    {
        return view("pages.backend.categories.edit", compact("category"));
    }
    public function postEdit(Request $request, Category $category)
    {
        $request->validate(
            [
                "name" => "required|string|",
            ],
            [
                'required' => ':attribute bắt buộc phải nhập.'
            ],
            [
                'name' => 'Tên danh mục',
            ]
        );
        $category->name = $request->name;
        $category->user_id = Auth::user()->id;
        if ($request->public == 'on') {
            $category->public = 1;
        }
        if ($request->status == 'on') {
            $category->status = 1;
        }
        $category->save();
        return redirect()->route('admin.category.list')->with('success', 'Cập nhật danh mục thành công');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.list')->with('success', 'Xóa danh mục thành công');
    }


    public function findCategory(Request $request)
    {


        $search_key = $request->input('search_key');
        if ($search_key == '') {
            return back()->with('error', "Vui lòng nhập key tìm kiếm hoặc chọn nhóm!");
        } else {
            $categories = Category::where('name', 'LIKE', '%' . $search_key . '%')
                ->paginate(6);
            return view('pages.backend.categories.data', compact('categories'));
        }
    }
}
