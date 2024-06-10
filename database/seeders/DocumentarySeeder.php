<?php

namespace Database\Seeders;

use App\Models\Documentary;
use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class DocumentarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons = Lesson::all();
        foreach ($lessons as $lesson) {
            for ($i=1; $i <= 3 ; $i++) { 
                $documentary = new Documentary();
                $documentary->lesson_id = $lesson->id;
                $documentary->name = "Doc $i ";
                $documentary->size =rand(1.0, 20.0);
                $documentary->url = "https://www.tutorialspoint.com/html/html_tutorial.pdf";
                $documentary->save();
            }
        }
    }
}
