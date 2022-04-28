<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Album extends Model
{
    use HasFactory, Sluggable;

    protected $dates = [
        'release_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tracks()
    {
        return $this->belongsToMany(Track::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function main_performers()
    {
        $main_performers = collect();
        foreach ($this->tracks as $track) {
            $main_performers = $main_performers->merge($track->main_performers());
        }
        return $main_performers->unique();
    }

    public function feat_performers()
    {
        $feat_performers = collect();
        foreach ($this->tracks as $track) {
            $feat_performers = $feat_performers->merge($track->feat_performers());
        }
        return $feat_performers->unique();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}