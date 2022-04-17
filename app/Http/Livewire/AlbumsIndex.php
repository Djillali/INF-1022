<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use Livewire\Component;
use Livewire\WithPagination;

class AlbumsIndex extends Component
{
    use WithPagination;

    public $genre = 'all';
    public $search;
    public $artist = 'all';
    public $user;
    public $order = 'new';

    protected $queryString = [
        'order',
        'genre' => ['excep' => ''],
        'artist',
        'user',
        'search',
    ];

    public function mount()
    {
        $this->genre = request()->genre ?? 'all';
        $this->order = request()->order ?? 'new';
        $this->user = request()->user ?? 'all';
        $this->artist = request()->artist ?? 'all';
        $this->search = request()->search;
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
    public function updatingGenre()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.albums-index',[
            'albums' => Album::with('user','tracks','tracks.performers','tracks.performers.artist','genres')
                ->when(strlen($this->search) >= 3, function ($query) { // Search Filter
                        $query->where('albums.title', 'like', '%' . $this->search . '%');
                })
                ->when(auth()->check() && $this->user && $this->user === 'user', function ($query) {  // current user
                    $query->where('albums.user_id', auth()->id());
                })
                ->when(strlen($this->genre) >= 3 && $this->genre !== 'all', function ($query) {
                    $query->whereHas('genres', function ($query){
                            $query->where('slug', $this->genre);
                    });
                })
                ->when(strlen($this->artist) >= 3 && $this->artist !== 'all', function ($query) {
                    $query->whereHas('tracks.performers.artist', function ($query) {
                        $query->where('slug', $this->artist);
                    });
                })
                ->withCount('tracks')
                ->when($this->order && $this->order === 'tracks', function ($query) {
                    $query->orderBy('tracks_count', 'desc');
                })
                ->when($this->order && $this->order === 'new', function ($query) {
                    $query->orderBy('albums.created_at', 'desc');
                })
                ->when($this->order && $this->order === 'release', function ($query) {
                    $query->orderBy('albums.release_date', 'desc');
                })->distinct()->paginate(10),
            'genres' => Genre::all(),
        ]);
    }
}