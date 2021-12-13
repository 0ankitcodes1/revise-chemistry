<?php

namespace Database\Factories;

use App\Models\ChapterVideo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapterVideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChapterVideo::class;

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
            'videoUrl' => env('APP_URL').'/resources/videos/video-'.rand(1,6).'.mp4',
            'subChapter' => $this->faker->sentence(),
            'mediaType' => 'video/mp4',
        ];
    }
}
