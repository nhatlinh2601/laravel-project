<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'Quản lý đơn hàng',
                'icon' => 'fa fa-cart-plus',
                'role'=>'admin'
            ],
            [
                'name' => 'Khóa học & Danh mục',
                'icon' => 'fa fa-book',
                'role'=>'admin'
            ],
            [
                'name' => 'Nội dung',
                'icon' => 'fa fa-pencil',
                'role'=>'admin'
            ],
            [
                'name' => 'Người dùng hệ thống',
                'icon' => 'fa fa-user',
                'role'=>'admin'
            ],
            [
                'name' => 'Quyền hạn người dùng',
                'icon' => 'fa fa-lock',
                'role'=>'admin'
            ],
            [
                'name' => 'Quản lý chung',
                'icon' => 'fa fa-bars',
                'role'=>'admin'
            ],
            [
                'name' => 'Khóa học',
                'icon' => 'fa fa-book',
                'role'=>'teacher'
            ],
            [
                'name' => 'Học viên',
                'icon' => 'fa fa-user',
                'role'=>'teacher'
            ],
            
        ];

        foreach ($menus as $menu) {
            Menu::updateOrCreate(['name' => $menu['name']], $menu);
        }
    }
}
