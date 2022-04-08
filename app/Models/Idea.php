<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function idea_category()
    {
        return $this->belongsTo(IdeaCategory::class);
    }

    public function idea_status()
    {
        return $this->belongsTo(IdeaStatus::class);
    }

    public function idea_votes()
    {
        return $this->belongsToMany(User::class, 'idea_votes');
    }

    public function isVotedByUser(?User $user)
    {
        if (!$user) {
            return false;
        }

        return IdeaVote::where('user_id', $user->id)
            ->where('idea_id', $this->id)
            ->exists();
    }

    public function vote(User $user)
    {
        IdeaVote::create([
            'idea_id' => $this->id,
            'user_id' => $user->id,
        ]);
    }

    public function removeVote(User $user)
    {
        IdeaVote::where('idea_id', $this->id)
            ->where('user_id', $user->id)
            ->first()
            ->delete();
    }
}
