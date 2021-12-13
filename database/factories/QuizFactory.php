<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QuizFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quiz::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $options = array('A', 'B', 'C', 'D');
        $category = ['O Levels', 'MYPIB', 'IBDP SL-HL', 'A Levels'];

        return [
            'question' => $this->faker->sentence(),
            'options' =>json_encode(
                [
                    $this->faker->word(rand(2,5)),
                    $this->faker->word(rand(2,5)),
                    $this->faker->word(rand(2,5)),
                    $this->faker->word(rand(2,5)),
                ]
            ),
            'answer' => $options[rand(0,3)],
            'description' => $this->faker->paragraph(),
            'chapter' => $category[rand(0,3)],
            'category' => $this->faker->word(),
            'subChapter' => ''
        ];
    }
}
