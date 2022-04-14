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
            'path' => 'https://media3.giphy.com/media/7A4KXR7DeBjfsG67SH/200.gif',
        ];
    }
}