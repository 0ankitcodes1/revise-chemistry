<?php

namespace Database\Factories;

use App\Models\StudentReport;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentReport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $options = array('A', 'B', 'C', 'D');
        
        return [
            'user_id' => rand(1, 100),
            'question_answer' => json_encode([
                [
                    'question_id' => rand(1, 100),
                    'answer' => 'A'
                ],
                [
                    'question_id' => rand(1, 100),
                    'answer' => 'B'
                ],
                [
                    'question_id' => rand(1, 100),
                    'answer' => 'C'
                ],
                [
                    'question_id' => rand(1, 100),
                    'answer' => 'D'
                ]
            ]),
            'question_attempted_count' => 4,
            'correct_answer_count' => rand(0,3),
            'total_question' => rand(0, 200),
        ];
    }
}
