<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\IdeaCategory;

class IdeaEdit extends Component
{
    public $idea;
    public $title;
    public $category;
    public $description;

    protected $rules = [
        'title' => 'required|min:4',
        'description' => 'required|min:4',
        'category' => 'required|exists:idea_categories,id',
    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->category = $idea->idea_category_id;
        $this->description = $idea->description;
    }

    public function editIdea()
    {

        if(auth()->user()->cannot('update',$this->idea)){
            abort(403);
        }

        $this->validate();

        $this->idea->title = $this->title;
        $this->idea->idea_category_id = $this->category;
        $this->idea->description = $this->description;
        $this->idea->save();
        $this->emit('ideaWasUpdated');
    }


    public function render()
    {
        return view('livewire.idea-edit', [
            'categories' => IdeaCategory::all(),
        ]);
    }
}