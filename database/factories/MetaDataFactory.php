<?php

namespace Database\Factories;

use App\Models\MetaData;
use Illuminate\Database\Eloquent\Factories\Factory;

class MetaDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MetaData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = array($this->faker->email, $this->faker->phoneNumber);

        return [
            'about' => $this->faker->word(1),
            'data' => $data[rand(0,1)],
        ];
    }
}
