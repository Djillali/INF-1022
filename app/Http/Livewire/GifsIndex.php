<?php

namespace App\Http\Livewire;

use App\Models\Gif;
use Livewire\Component;
use Livewire\WithPagination;

class GifsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.gifs-index',[
            'gifs' => Gif::simplePaginate(12)
        ]);
    }
}