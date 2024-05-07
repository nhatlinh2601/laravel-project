<?php

namespace Database\Seeders;

use App\Models\ChildMenu;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menu_cart = Menu::where('name', 'Quản lý đơn hàng')->first()->id;
        $menu_course = Menu::where('name', 'Khóa học & Danh mục')->first()->id;
        $menu_post = Menu::where('name', 'Nội dung')->first()->id;
        $menu_user = Menu::where('name', 'Người dùng hệ thống')->first()->id;
        $menu_permission = Menu::where('name', 'Quyền hạn người dùng')->first()->id;
        $menu_menu = Menu::where('name', 'Quản lý chung')->first()->id;
        $teacher_courses = Menu::where('name', 'Khóa học')->first()->id;
        $teacher_students = Menu::where('name', 'Học viên')->first()->id;
        $childs_menu = [
            [
                'name' => 'Đơn hàng',
                'menu_id' => $menu_cart,
                'link' => 'admin.order.index'
            ],
            [
                'name' => 'Quản lý khóa học',
                'menu_id' => $menu_course,
                'link' => 'admin.course.index'
            ],
            [
                'name' => 'Quản lý danh mục',
                'menu_id' => $menu_course,
                'link' => 'admin.category.index'
            ],
            [
                'name' => 'Đánh giá',
                'menu_id' => $menu_post,
                'link' => 'admin.review.index'
            ],
            [
                'name' => 'Tin tức',
                'menu_id' => $menu_post,
                'link' => 'admin.post.index'
            ],
            [
                'name' => 'Quản lý người dùng',
                'menu_id' => $menu_user,
                'link' => 'admin.user.index'
            ],

            [
                'name' => 'Quản lý giảng viên',
                'menu_id' => $menu_user,
                'link' => 'admin.teacher.index'
            ],

            [
                'name' => 'Nhóm quyền',
                'menu_id' => $menu_permission,
                'link' => 'admin.role.index'
            ],
            [
                'name' => 'Quyền hạn',
                'menu_id' => $menu_permission,
                'link' => 'admin.permission.index'
            ],
            [
                'name' => 'Menu',
                'menu_id' => $menu_menu,
                'link' => 'admin.menu.index'
            ],
            [
                'name' => 'Khóa học của tôi',
                'menu_id' => $teacher_courses,
                'link' => 'admin.gv.myCourses'
            ],
            [
                'name' => 'Học viên của tôi',
                'menu_id' => $teacher_students,
                'link' => 'admin.gv.myStudents'
            ],

        ];
        foreach ($childs_menu as $child) {
            ChildMenu::updateOrCreate(['name' => $child['name']], $child);
        }
    }
}
