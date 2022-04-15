<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlbumCard extends Component
{
    public $album;
    
    public function render()
    {
        return view('livewire.album-card');
    }
}
