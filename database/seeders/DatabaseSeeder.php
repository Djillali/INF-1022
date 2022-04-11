<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\User;
use App\Models\IdeaVote;
use App\Models\IdeaStatus;
use App\Models\IdeaCategory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        IdeaCategory::factory()->create(['name' => 'Website']);
        IdeaCategory::factory()->create(['name' => 'Ideas']);
        IdeaCategory::factory()->create(['name' => 'Gif Organizer']);
        IdeaCategory::factory()->create(['name' => 'Music Library']);

        IdeaStatus::factory()->create(['name' => 'Open']);
        IdeaStatus::factory()->create(['name' => 'Considering']);
        IdeaStatus::factory()->create(['name' => 'Pending']);
        IdeaStatus::factory()->create(['name' => 'Implemented']);
        IdeaStatus::factory()->create(['name' => 'Closed']);

        $role_admin = Role::create(['name' => 'admin']);
        $permission_set_status = Permission::create(['name' => 'set idea status']);
        $permission_edit_ideas = Permission::create(['name' => 'edit all ideas']);
        $permission_delete_ideas = Permission::create(['name' => 'delete all ideas']);
        $role_admin->givePermissionTo($permission_set_status);
        $role_admin->givePermissionTo($permission_edit_ideas);
        $role_admin->givePermissionTo($permission_delete_ideas);
        User::factory()->create(['name' => 'Djillali', 'email' => 'djillali.dev@gmail.com'])->assignRole('admin');

        User::factory()->create(['name' => 'Djillali2', 'email' => 'djillali.dev2@gmail.com']);

        if ((env('APP_ENV') === 'local')) {
            User::factory(49)->create();
            Idea::factory(100)->create();

            $ideaIds = collect(range(1, 100));
            $userIds = collect(range(1, 51));

            $possibleVotes = $userIds->crossJoin($ideaIds);

            $votes = $possibleVotes
            ->random(350)
            ->map(fn ($item) => [
                'user_id' => $item[0],
                'idea_id' => $item[1],
            ])
            ->all();

            IdeaVote::factory()->createMany($votes);
        }



    }
}
