<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Answer::class;
    public function definition()
    {
        $questions = Question::all();

        // Ngẫu nhiên chọn một câu hỏi
        $question = $this->faker->randomElement($questions);

        // Định nghĩa các thuộc tính cho câu trả lời
        return [
            'answer' => $this->faker->sentence(),
            'question_id' => $question->id,
        ];
    }
}
