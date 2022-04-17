<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\User;
use App\Models\IdeaVote;
use App\Models\IdeaStatus;
use App\Models\IdeaCategory;
use App\Models\IdeaComment;
use App\Models\Gif;
use App\Models\Tag;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use App\Models\Performer;
use App\Models\Genre;
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

            foreach (Idea::all() as $idea) {
                IdeaComment::factory(rand(0, 6))->existing()->create(['idea_id' => $idea->id]);
            }

            Gif::factory(100)->create();
            Tag::factory(25)->create();

            $tags = Tag::all();
            $gifs = Gif::all();
            foreach ($gifs as $gif) {
                $gif->tags()->attach(rand(1, 6),);
            }

            Album::factory(100)->create();
            Artist::factory(50)->create();
            foreach (Album::all() as $album) {
                Track::factory(rand(5, 24))->existing()->create(['album_id' => $album->id]);
            }

            Genre::factory()->create(['name' => 'Reggae']);
            Genre::factory()->create(['name' => 'Dancehall']);
            Genre::factory()->create(['name' => 'Hip-Hop']);
            Genre::factory()->create(['name' => 'Rock']);
            Genre::factory()->create(['name' => 'Folk']);
            Genre::factory()->create(['name' => 'World-Music']);
            Genre::factory()->create(['name' => 'Folk-Rock']);
            Genre::factory()->create(['name' => 'Indie-Rock']);
            Genre::factory()->create(['name' => 'Metal']);
            Genre::factory()->create(['name' => 'Punk']);
            Genre::factory()->create(['name' => 'Electronic']);
            Genre::factory()->create(['name' => 'Country']);
            Genre::factory()->create(['name' => 'Post-Rock']);
            Genre::factory()->create(['name' => 'Industrial']);
            Genre::factory()->create(['name' => 'Classical']);



            foreach (Album::all() as $album) {
                $roles = Genre::find([rand(1, 7), rand(8, 15)]);
                $album->genres()->attach($roles);
                $album->save();
                $artist_id = rand(1, 50);
                foreach ($album->tracks as $track) {
                    Performer::factory()->existing()->create(['track_id' => $track->id, 'artist_id' => $artist_id, 'type' => 'Main']);
                    Performer::factory(rand(0, 2))->existing()->create(['track_id' => $track->id, 'type' => 'Feat']);
            }
        }
        }
    }
}
