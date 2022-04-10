<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;
use App\Models\IdeaStatus;

class IdeasFilters extends Component
{
    public $status;
    public $statusCount;

    public function mount()
    {
        $this->status = request('status') ?? 'all';
        $this->statusCount = IdeaStatus::getCount();

        if (Route::currentRouteName() === 'ideas.show') {
            $this->status = null;
        }
    }

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
        $this->emit('queryStringUpdatedStatus', $this->status);

        if ($this->getPreviousRouteName() === 'ideas.show') {
            return redirect()->route('ideas.index', [
                'status' => $this->status,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.ideas-filters');
    }

    private function getPreviousRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }
}