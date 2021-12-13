<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $blogCategory = ['O Levels', 'MYPIB', 'IBDP SL-HL', 'A Levels'];

        return [
            'thumbnail' => env('APP_URL').'/resources/images/img-'.rand(1,6).'.jpg',
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(40),
            'category' => $blogCategory[rand(0,3)],
        ];
    }
}
