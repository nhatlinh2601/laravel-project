<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $lessons=Lesson::all();

        foreach ($lessons as $lesson) {
       
                Test::updateOrCreate(
                    ['title' => 'Test of lesson '. $lesson->name],
                    [
                        'lesson_id' => $lesson->id,
                        'title' => 'Test of lesson '. $lesson->name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            
        }
    }
}
