<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = ['O Levels', 'MYPIB', 'IBDP SL-HL', 'A Levels'];

        return [
            'chapter' => $this->faker->sentence(),
            'category' => $category[rand(0,3)],
            'notes' => $this->faker->paragraph(30),
            'subChapter' => $this->faker->sentence()
        ];
    }
}
