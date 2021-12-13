<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => explode(" ", $this->faker->name)[0],
            'last_name' => explode(" ", $this->faker->name)[1],
            'email' => $this->faker->unique()->safeEmail,
            'contact' => $this->faker->phoneNumber,
            'password' => Hash::make('quizapp'),
            'avatar' => 'https://source.unsplash.com/random',
            'token' => Str::random(255),
        ];
    }
}
