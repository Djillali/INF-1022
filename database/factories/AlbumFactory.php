<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album::class;

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
            'cover' => 'https://source.unsplash.com/200x200/?music&v=' . rand(1,20000),
            'description' => $this->faker->paragraph(5),
            'release_date' => Carbon::now()->subDays(rand(1, 7000)),
        ];
    }
}