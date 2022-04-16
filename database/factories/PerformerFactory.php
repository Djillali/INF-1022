<?php

namespace Database\Factories;

use App\Models\Performer;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerformerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Performer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'artist_id' => $this->faker->numberBetween(1, 50),
        ];
    }

    public function existing()
    {
        return $this->state(function (array $attributes) {
            return [
            ];
        });
    }
}