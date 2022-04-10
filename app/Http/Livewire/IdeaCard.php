<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaCard extends Component
{
    public $idea;
    public $votesCount;
    public $hasVoted;
    public $isIndex;

    protected $listeners = ['statusWasUpdated'];

    public function mount(Idea $idea, $votesCount, $isIndex)
    {
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->isIndex = $isIndex;
        $this->hasVoted = $idea->isVotedByUser(auth()->user());
    }

    public function statusWasUpdated()
    {
        $this->idea->refresh();
    }

    public function vote()
    {
        if (!auth()->check()) {
            return redirect(route('login'));
        }

        if ($this->hasVoted) {
            $this->idea->removeVote(auth()->user());
            $this->votesCount--;
            $this->hasVoted = false;
        } else {
            $this->idea->vote(auth()->user());
            $this->votesCount++;
            $this->hasVoted = true;
        }
    }

    public function render()
    {
        if($this->isIndex){
            return view('livewire.idea-index');
        }else{
            return view('livewire.idea-show');
        }
        
    }
}