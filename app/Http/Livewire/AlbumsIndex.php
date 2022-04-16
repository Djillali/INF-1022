<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\Artist;
use Livewire\Component;
use Livewire\WithPagination;

class AlbumsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.albums-index',[
            'albums' => Album::with('user','tracks','tracks.performers','tracks.performers.artist','genres')
            ->withCount('tracks')
            ->paginate(10)
        ]);
    }
}