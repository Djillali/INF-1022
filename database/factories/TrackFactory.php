<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Track::class;

    private static $position = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'album_id' => Album::factory(),
            'title' => ucwords($this->faker->words(2, true)),
            'disc_number' => 1,
            'duration' => rand(2, 8) . ':' . rand(10, 59),
        ];
    }

    public function existing()
    {
         self::$position = 1;
        return $this->state(function (array $attributes) {
            return [
                'position' => self::$position++,
            ];
        });

    }
}