<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
        $this->call(GroupSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(ChildMenuSeeder::class);
        $this->call(OrderDetailSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(NotificationSeeder::class);
    }
}
