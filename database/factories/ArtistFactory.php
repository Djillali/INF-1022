<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>   $this->faker->name(),
            'picture' => 'https://source.unsplash.com/200x200/?artist&v=' . rand(1, 20000),
            'description' => $this->faker->paragraph(5),
            'date_of_death' => Carbon::now()->subDays(rand(1, 7000)),
            'date_of_death' => Carbon::now()->subDays(rand(1, 7000)),
        ];
    }
}