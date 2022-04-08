<?php

namespace App\Http\Livewire;

use App\Models\IdeaCategory;
use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class CreateIdea extends Component
{
    public $title;
    public $idea_category = 1;
    public $description;

    protected $rules = [
        'title' => 'required|min:4',
        'idea_category' => 'required|exists:idea_categories,id',
        'description' => 'required|min:4',
    ];

    public function createIdea()
    {
        if (auth()->check()) {
            $this->validate();

            Idea::create([
                'user_id' => auth()->id(),
                'idea_category_id' => $this->idea_category,
                'idea_status_id' => 1, // Open by default
                'title' => $this->title,
                'description' => $this->description,
            ]);

            session()->flash('success_message', 'Idea was added successfully.');

            $this->reset();

            return redirect()->route('ideas.index');
        }

        abort(Response::HTTP_FORBIDDEN);
    }

    public function render()
    {
        return view('livewire.create-idea', [
            'categories' => IdeaCategory::all(),
        ]);
    }
}