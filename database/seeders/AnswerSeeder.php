<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
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
            // Tạo 4 bản ghi dữ liệu mẫu cho các câu trả lời của mỗi câu hỏi
            for ($i = 1; $i <= 4; $i++) {
                Answer::create([
                    'answer' => "Answer $i for question: $question->id",
                    'question_id' => $question->id,
                ]);
            }
        }
    }
}
