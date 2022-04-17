<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function performers()
    {
        return $this->hasMany(Performer::class);
    }

    public function main_performers()
    {
        $main_performers = collect();

        foreach ($this->performers as $performer) {
            if ($performer->type === 'Main') {
                if(! $main_performers->contains($performer->artist)){
                    $main_performers->add($performer->artist);
                }
            }
        }
        return $main_performers;
    }

    public function feat_performers()
    {
        $feat_performers = collect();

        foreach ($this->performers as $performer) {
            if ($performer->type === 'Feat') {
                if (!$feat_performers->contains($performer->artist)) {
                    $feat_performers->add($performer->artist);
                }
            }
        }

        return $feat_performers;
    }
}