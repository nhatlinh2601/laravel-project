<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Tạo các roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
      
        
        // Tạo các permissions
        $permissions = [
            'create_course', 'edit_course', 'delete_course', 'publish_course',
            'create_lesson', 'edit_lesson', 'delete_lesson',
            'upload_video', 'edit_video', 'delete_video',
            'upload_documentary', 'edit_documentary', 'delete_documentary',
            'create_review', 'edit_review', 'delete_review',
            'create_post', 'edit_post', 'delete_post',
            'view_orders', 'manage_orders',
            'manage_users', 'assign_roles', 'assign_permissions',
            'enroll_in_course',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Gán permissions cho roles
        $adminRole->givePermissionTo($permissions);
        $teacherRole->givePermissionTo([
            'create_course', 'edit_course', 'delete_course', 'publish_course',
            'create_lesson', 'edit_lesson', 'delete_lesson',
            'upload_video', 'edit_video', 'delete_video',
            'upload_documentary', 'edit_documentary', 'delete_documentary',
            'create_review', 'edit_review', 'delete_review',
        ]);
        

        $admins=User::where('group_id','=', '1')->get();
        $teachers=User::where('group_id','=','2')->get();
       
        foreach ($admins as $admin) {
            $admin->assignRole('admin');
        }
        foreach ($teachers as $teacher) {
            $teacher->assignRole('teacher');
        }
        
    }
}
