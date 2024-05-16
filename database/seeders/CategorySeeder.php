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
                'name' => 'BackEnd',
                'user_id' => $users->random()->id,
                "image_path" => "https://image.freepik.com/free-vector/backend-technology-concept-with-glowing-lines-background_1017-28405.jpg"
            ],
            [
                'name' => 'FrontEnd',
                'user_id' => $users->random()->id,
                "image_path" => "https://tkhive.com/wp-content/uploads/2021/07/TKHive_-Digital_Transformation2.webp"
            ],
            [
                'name' => 'Mobile',
                'user_id' => $users->random()->id,
                "image_path" => "https://img.freepik.com/premium-psd/smartphone-14-pro-mockup_627345-66.jpg"
            ],
            [
                'name' => 'Network & Sercurity',
                'user_id' => $users->random()->id,
                "image_path" => "https://th.bing.com/th/id/R.9c717618b89c8314fbc457a142da61c5?rik=a2%2fJ2NnswbQgfA&pid=ImgRaw&r=0"
            ],
            [
                'name' => 'Algorithms',
                'user_id' => $users->random()->id,
                "image_path" => "https://static.vecteezy.com/system/resources/previews/012/991/085/original/algorithm-icon-illustration-for-graphic-and-web-design-free-vector.jpg"
            ],
          
        ];
        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category);
        }
        
    }
}
