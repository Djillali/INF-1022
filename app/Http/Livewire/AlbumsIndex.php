<?php

namespace App\Http\Livewire;

use App\Models\Album;
use Livewire\Component;
use Livewire\WithPagination;

class AlbumsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.albums-index',[
            'albums' => Album::paginate(10)
        ]);
    }
}