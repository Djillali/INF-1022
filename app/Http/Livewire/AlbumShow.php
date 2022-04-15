<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlbumShow extends Component
{

    public $album;

    public function render()
    {
        return view('livewire.album-show');
    }
}