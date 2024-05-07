<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Course;
use App\Models\Order;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
    }
    public function add()
    {

        $groups = Group::all();
        $roles=Role::all();
        return view("pages.backend.user.add", compact('groups','roles'));
    }
    public function postAdd(Request $request)
    {

        $request->validate(
            [
                "name" => "required|string",
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:6',
                'image' => 'required|image',
                'group' => ['required', 'integer', function ($attribute, $value, $fail) {
                    if ($value === '0') return $fail('Vui lòng chọn nhóm');
                }]
            ],
            [
                'required' => ':attribute bắt buộc phải nhập.',
                'email' => ':attribute không đúng định dạng.',
                'string' => ':attribute phải là kí tự.',
                'min' => ':attribute phải có ít nhất :min kí tự.',
                'unique' => ':attribute đã tồn tại',
                'image' => 'File không hợp lệ. Vui lòng thử lại'
            ],
            [
                'name' => 'Họ tên',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'group' => "Nhóm",
                "image" => ' Hình ảnh'
            ]
        );


        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('img/users', 'public');
        }


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->group_id = $request->group;
        $user->image_path = $imagePath;
        $user->save();
        if($user->group->name=='Quản trị viên'){
            $user->assignRole('admin');
        }
        if($user->group->name=='Giáo viên'){
            $user->assignRole('teacher');
        }
        if($user->group->name=='Học viên'){
            $user->assignRole('student');
        }

        return redirect()->route("admin.user.list")->with("success", "Thêm người dùng thành công");
    }

    public function listUser()
    {
        $users = User::withTrashed()->orderBy('deleted_at', 'ASC')->orderBy('id', 'ASC')->paginate(6);
        $groups = Group::all();

        return view("pages.backend.user.list", compact(["users", "groups"]));
    }
    public function listUserAjax()
    {
        if (request()->ajax()) {
            $users = User::withTrashed()->orderBy('deleted_at', 'ASC')->orderBy('id', 'ASC')->paginate(6);
            $groups = Group::all();
            return view("pages.backend.user.data", compact(["users", "groups"]))->render();
        }
    }

    public function profile(User $user)
    {
        $posts=Post::where('user_id',$user->id)->get();
        $courses=[];
        if($user->group->name=='Giáo viên'){
            $courses=Course::where('teacher_id',$user->id)->get();
        }
        if($user->group->name=='Học viên'){
            $courses=Course::where('teacher_id',$user->id)->get();
        }
       
        return view("pages.backend.user.profile", compact(["user","posts","courses"]));
    }

    public function edit(User $user)
    {
        $groups = Group::all();
        $roles=Role::all();
        $userRoles=$user->getRoleNames();
        return view("pages.backend.user.edit", compact(["user", "groups",'roles','userRoles']));
    }
    public function postEdit(Request $request, User $user)
    {
        $request->validate(
            [
                "name" => "required|string",
                // 'email' => 'required|string|email|unique:users',
                // 'password' => 'required|string|min:6',
                'group' => ['required', 'integer', function ($attribute, $value, $fail) {
                    if ($value === '0') return $fail('Vui lòng chọn nhóm');
                }]
            ],
            [
                'required' => ':attribute bắt buộc phải nhập.',
                'email' => ':attribute không đúng định dạng.',
                'string' => ':attribute phải là kí tự.',
                'min' => ':attribute phải có ít nhất :min kí tự.',
                'unique' => ':attribute đã tồn tại',
                'image' => 'File không hợp lệ. Vui lòng thử lại'
            ],
            [
                'name' => 'Họ tên',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'group' => "Nhóm",
                "image" => ' Hình ảnh'
            ]
        );



        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('img/users', 'public');
            $user->image_path = $imagePath;
        }

        $user->name = $request->name;
        $user->group_id = $request->group;
        $user->save();

        if($user->group->name=='Quản trị viên'){
            $user->syncRoles(['admin']);
        }
        if($user->group->name=='Giáo viên'){
            $user->syncRoles(['teacher']);
        }
        if($user->group->name=='Học viên'){
            $user->syncRoles(['student']);
        }
       
        return redirect()->route("admin.user.list")->with("success", "Cập nhật người dùng thành công");
    }

    public function delete(User $user)
    {

        if ($user->delete()) {
            return back()->with("success", "Xóa người dùng thành công");
        } else {
            return back()->with("error", "Đã có lỗi xảy ra. Vui lòng thử lại");
        }
    }

    public function forceDelete($id)
    {

        if (User::withTrashed()->where('id', $id)->forceDelete())
            return back()->with("success", "Xóa vĩnh viễn người dùng thành công");
        else
            return back()->with("error", "Đã có lỗi xảy ra. Vui lòng thử lại");
    }

    public function restore($id)
    {


        if (User::withTrashed()->where('id', $id)->restore())
            return back()->with("success", "Khôi phục người dùng thành công");
        else
            return back()->with("error", "Đã có lỗi xảy ra. Vui lòng thử lại");
    }

    public function deleteMultiple(Request $request)
    {
        $userIDs = $request->input("userCheckbox");

        if ($userIDs) {
            User::whereIn("id", $userIDs)->delete();
            return back()->with("success", "Xóa nhiều người dùng thành công");
        } else {
            return back()->with("error", "Chưa có người dùng nào được chọn.");
        }
    }

    public function findUser(Request $request)
    {
        $groups = Group::all();
        $search_key = $request->input('search_key');
        $group = $request->input('group');
        $groupModel = Group::find($group);


        if ($groupModel) {
            $users = $groupModel->users()
                ->where(function ($query) use ($search_key) {
                    $query->where('name', 'LIKE', '%' . $search_key . '%')
                        ->orWhere('email', 'LIKE', '%' . $search_key . '%');
                })
                ->paginate(6);
        } else {

            $users = User::where('name', 'LIKE', '%' . $search_key . '%')
                ->orWhere('name', 'LIKE', '%' . $search_key . '%')
                ->paginate(6);
        }
        return view('pages.backend.user.data', compact('users', 'groups', 'groupModel'))->render();
    }

    public function userByGroup(Request $request)
    {
        $groups = Group::all();
        $group = $request->input('group');
        $groupModel = Group::find($group);

        if ($groupModel) {
            $users = $groupModel->users()->paginate(6);
            return view('pages.backend.user.list', compact('users', 'groups', 'groupModel'));
        }
    }
    public function userByGroupAjax(Request $request)
    {
        if (request()->ajax()) {
            $groups = Group::all();
            $group = $request->input('group');
            $groupModel = Group::find($group);
            if ($groupModel) {
                $users = $groupModel->users()->paginate(6);
            } else {
                $users = User::paginate(6);
            }
            return view('pages.backend.user.data', compact('users', 'groups', 'groupModel'))->render();
        }
    }

    public function writePost()
    {
        $categories = Category::all();
        return view('pages.backend.post.write', compact('categories'));
    }
    public function postWritePost(Request $request)
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
            $post = new Post();
            $post->title = $request->post_title;
            $post->content = $request->post_content;
            $post->category_id = $request->category;
            $post->user_id = auth()->user()->id;
            $post->save();
            return redirect()->route('admin.post.index')->with('success', 'Thêm bài viết thành công.');
        } else {
            // Xử lý trường hợp người dùng chưa đăng nhập
            return redirect()->route('admin.login')->with('error', 'Bạn cần đăng nhập để đăng bài viết.');
        }
    }

    public function myPost()
    {
    }
}
