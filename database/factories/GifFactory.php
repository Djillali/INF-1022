<?php

namespace Database\Factories;

use App\Models\Gif;
use Illuminate\Database\Eloquent\Factories\Factory;

class GifFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gif::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'title' => ucwords($this->faker->words(3, true)),
            'path' => 'https://source.unsplash.com/200x200/?gif&v=' . rand(1, 20000),
        ];
    }
}