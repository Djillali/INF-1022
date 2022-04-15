<?php

namespace Database\Factories;

use App\Models\Idea;
use App\Models\User;
use App\Models\IdeaComment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IdeaComment>
 */
class IdeaCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'idea_id' => Idea::factory(),
            'body' => $this->faker->paragraph(rand(2,5)),
        ];
    }

    public function existing()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => $this->faker->numberBetween(1, 20),
            ];
        });
    }
}
