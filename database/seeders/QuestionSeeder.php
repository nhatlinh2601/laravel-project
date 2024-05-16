<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $tests= Test::all();

        foreach ($tests as $test) {
            
            for ($i=0; $i < 5; $i++) { 
                
                Question::updateOrCreate(
                    ['text' => 'Question '. $i . ' of '. $test->title],
                    [
                        'text' => 'Question '. $i . ' of '. $test->title,
                        'test_id' => $test->id,
                        'optionA' => "Option A",
                        'optionB' => "Option B",
                        'optionC' => "Option C",
                        'optionD' => "Option D",
                        'correctAnswer'=>"Option A",
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
       
               
            
        }
    }
}
