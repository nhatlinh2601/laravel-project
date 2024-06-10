<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Question::class;
    public function definition()
    {
        $tests = Test::all();


        // Randomly select a test
        $test = $this->faker->randomElement($tests);

        // Define the attributes for the question
      
            return [
                'text' => $this->faker->sentence(),
                'test_id' => $test->id,
                'correctAns_id' => "1",
                'created_at' => now(),
                'updated_at' => now(),
            ];
        
    }
}
