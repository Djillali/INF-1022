<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IdeaVote;
use App\Models\IdeaCategory;
use Carbon\Carbon;

class IdeasIndex extends Component
{
    use WithPagination;

    public $status = 'all';
    public $category = 'all';
    public $order = 'new';
    public $filter = 'all';
    public $user = 'all';
    public $search;

    protected $queryString = [
        'status' => ['excep' => ''],
        'category',
        'order',
        'filter',
        'search',
    ];

    protected $listeners = ['queryStringUpdatedStatus'];

    public function mount()
    {
        $this->status = request()->status ?? 'all';
        $this->category = request()->category ?? 'all';
        $this->order = request()->order ?? 'new';
        $this->filter = request()->filter ?? 'all';
        $this->user = request()->user ?? 'all';
        $this->search = request()->search;
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingOrder()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
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

    public function queryStringUpdatedStatus($newStatus)
    {
        $this->resetPage();
        $this->status = $newStatus;
    }
    public function render()
    {
        return view('livewire.ideas-index', [
        'ideas' => Idea::with('user', 'idea_category', 'idea_status','comments')
            ->join('idea_statuses', 'idea_statuses.id','=','ideas.idea_status_id')
            ->join('idea_categories', 'idea_categories.id','=','ideas.idea_category_id')
            ->join('users', 'users.id','=','ideas.user_id')
                ->when($this->order && $this->order === 'spam', function ($query) {
                    return $query->where('spam_reports', '>', 0)->orderBy('spam_reports', 'desc');
                })
                ->when($this->status && $this->status !== 'all', function ($query) {
                            $query->where('idea_statuses.slug', $this->status);
                        })
                ->when($this->category && $this->category !== 'all', function ($query) {
                    $query->where('idea_categories.slug', $this->category);
                })
                ->addSelect([
                    'voted_by_user' => IdeaVote::select('id')
                        ->where('user_id', auth()->id())
                        ->whereColumn('idea_id', 'ideas.id')
                    ])
                ->withCount('idea_votes')
                ->withCount('comments')
                ->when($this->order && $this->order === 'new', function ($query) {
                    $query->orderBy('ideas.id', 'desc');
                })
                ->when($this->order && $this->order === 'old', function ($query) {
                    $query->orderBy('ideas.id', 'asc');
                })
                ->when($this->order && $this->order === 'most', function ($query) {
                    $query->orderBy('idea_votes_count', 'desc');
                })
                ->when($this->order && $this->order === 'less', function ($query) {
                    $query->orderBy('idea_votes_count', 'asc');
                })
                ->when($this->order && $this->order === 'com', function ($query) {
                    $query->orderBy('comments_count', 'desc');
                })
                ->when(auth()->check() && $this->filter && $this->filter === 'user', function ($query) {  // current user
                    $query->where('users.id', auth()->id());
                })
                ->when($this->filter && $this->filter === '24h', function ($query) {
                    $query->where('ideas.created_at', '>=',Carbon::parse('-24 hours'));
                })
                ->when($this->filter && $this->filter === '7d', function ($query) {
                    $query->where('ideas.created_at', '>=',Carbon::parse('-7 days'));
                })
                ->when($this->filter && $this->filter === '30d', function ($query) {
                    $query->where('ideas.created_at', '>=',Carbon::parse('-30 days'));
                })
                ->when(strlen($this->search) >= 3, function ($query) { // Search Filter
                    $query->where('ideas.title', 'like','%' . $this->search . '%');
                })
                ->simplePaginate(10),
        'categories' => IdeaCategory::all(),
        ]);
    }
}