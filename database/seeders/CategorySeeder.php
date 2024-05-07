<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=User::all();
        $categories = [
            [
                'name' => 'Lập trình Front-End',
                'user_id' => $users->random()->id
            ],
            [
                'name' => 'Lập trình Mobile',
                'user_id' => $users->random()->id
            ],
            [
                'name' => 'Lập trình Android',
                'user_id' => $users->random()->id
            ],
            [
                'name' => 'Thủ thuật lập trình',
                'user_id' => $users->random()->id
            ],
            [
                'name' => 'Phân tích thiết kế',
                'user_id' => $users->random()->id
            ],
            [
                'name' => 'Lập trình Java',
                'user_id' => $users->random()->id
            ],
            [
                'name' => 'Lập trình C',
                'user_id' => $users->random()->id
            ],
            [
                'name' => 'Unity3D',
                'user_id' => $users->random()->id
            ],
            [
                'name' => 'Lập trình PHP',
                'user_id' => $users->random()->id
            ],
        ];
        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category);
        }
        
    }
}
