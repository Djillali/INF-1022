<?php

namespace App\Http\Livewire;

use App\Models\Gif;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class GifsIndex extends Component
{
    use WithPagination;

    public $tag_id = 'all';
    public $search;
    public $user;
    public $order = 'new';


    protected $queryString = [
        'tag_id' => ['excep' => ''],
        'search',
        'user',
        'order',
    ];

    public function tagChange($_tag_id)
    {
        $this->tag_id = $_tag_id;
        $this->resetPage();
    }
    public function updatingUser()
    {
        $this->resetPage();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingOrder()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.gifs-index',[
            'gifs' => Gif::with('user','tags')
                ->when(auth()->check() && $this->user && $this->user === 'user', function ($query) {  // current user
                        $query->where('user_id', auth()->id());
                    })
                ->when($this->tag_id && $this->tag_id !== 'all', function ($query) {
                    return $query->whereHas('tags', function ($query) {
                            $query->where('tags.id', $this->tag_id);
                        });
                })
                ->when(strlen($this->search) >= 3, function ($query) { // Search Filter
                    $query->where('gifs.title', 'like', '%' . $this->search . '%');
                })
                ->when($this->order && $this->order === 'new', function ($query) {
                    $query->orderBy('gifs.id', 'desc');
                })
                ->when($this->order && $this->order === 'old', function ($query) {
                    $query->orderBy('gifs.id', 'asc');
                })
                ->simplePaginate(8),
            'tags' => Tag::all(),
        ]);
    }
}