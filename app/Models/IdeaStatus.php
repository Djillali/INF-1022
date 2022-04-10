<?php

namespace App\Models;

use resources\Lang;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdeaStatus extends Model
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

    public function getStatusClasses()
    {
        $allStatuses = [
            'Open' => 'bg-gray-200',
            'Considering' => 'bg-purple-600 text-white',
            'Pending' => 'bg-yellow-600 text-white',
            'Implemented' => 'bg-green-600 text-white',
            'Closed' => 'bg-red-600 text-white',
        ];

        return $allStatuses[$this->name];
    }

    public function getStatusName()
    {
        switch ($this->slug) {
            case 'open':
                return __('ideas.open');
                break;
            case 'closed':
                return __('ideas.closed');
                break;
            case 'implemented':
                return __('ideas.implemented');
                break;
            case 'pending':
                return __('ideas.pending');
                break;
            case 'considering':
                return __('ideas.considering');
                break;
            
            default:
                 return 'No Status';
                break;
        }
    }

    public static function getCount()
    {
        return Idea::query()
            ->selectRaw("count(*) as all_statuses")
            ->selectRaw("count(case when idea_status_id = 1 then 1 end) as open")
            ->selectRaw("count(case when idea_status_id = 2 then 1 end) as considering")
            ->selectRaw("count(case when idea_status_id = 3 then 1 end) as pending")
            ->selectRaw("count(case when idea_status_id = 4 then 1 end) as implemented")
            ->selectRaw("count(case when idea_status_id = 5 then 1 end) as closed")
            ->first()
            ->toArray();
    }


}