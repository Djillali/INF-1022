<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\IdeaStatus;
use App\Models\IdeaCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        IdeaCategory::factory()->create(['name' => 'Website']);
        IdeaCategory::factory()->create(['name' => 'Ideas']);
        IdeaCategory::factory()->create(['name' => 'Gif Organizer']);
        IdeaCategory::factory()->create(['name' => 'Music Library']);

        IdeaStatus::factory()->create(['name' => 'Open']);
        IdeaStatus::factory()->create(['name' => 'Considering']);
        IdeaStatus::factory()->create(['name' => 'Pending']);
        IdeaStatus::factory()->create(['name' => 'Implemented']);
        IdeaStatus::factory()->create(['name' => 'Closed']);

        Idea::factory(30)->create();
    }
}
