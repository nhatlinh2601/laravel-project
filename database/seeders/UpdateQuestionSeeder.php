<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = Question::all();

    
        foreach ($questions as $question) {
          
            $answers = $question->answers;

           
            if ($answers->count() > 0) {
               
                $randomAnswer = $answers->random();
                $randomAnswerId = $randomAnswer->id;

                $question->correctAns_id = $randomAnswerId;

               
                $question->save();
            }
        }
    }
}
