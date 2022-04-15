<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\IdeaVote;
use App\Models\IdeaComment;
use Illuminate\Http\Response;
use Livewire\Component;

class IdeaDelete extends Component
{
    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function deleteIdea()
    {
        if (auth()->guest() || auth()->user()->cannot('delete', $this->idea)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        IdeaVote::where('idea_id', $this->idea->id)->delete();
        IdeaComment::where('idea_id', $this->idea->id)->delete();

        Idea::destroy($this->idea->id);
        
        session()->flash('success_message', 'Idea was deleted successfully!');

        return redirect()->route('ideas.index');
    }

    public function render()
    {
        return view('livewire.idea-delete');
    }
}