<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Artist extends Model
{
    use HasFactory, Sluggable;

    protected $dates = [
        'date_of_death',
        'date_of_birth'
    ];

    public function performers()
    {
        return $this->hasMany(Performer::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}