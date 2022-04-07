<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdeaCategory extends Model
{
    use HasFactory, Sluggable;

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getCategoryName()
    {
        switch ($this->slug) {
            case 'website':
                return __('ideas.website');
                break;
            case 'music-library':
                return __('ideas.music-library');
                break;
            case 'gif-organizer':
                return __('ideas.gif-organizer');
                break;
            case 'ideas':
                return __('ideas.ideas');
                break;
            case 'considering':
                return __('ideas.considering');
                break;
            
            default:
                 return 'No Status';
                break;
        }
    }
}