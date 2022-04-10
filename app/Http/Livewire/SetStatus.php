<?php

namespace App\Http\Livewire;

use Illuminate\Http\Response;
use Livewire\Component;
use App\Models\Idea;

class SetStatus extends Component
{
    public $idea;
    public $status;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->status = $this->idea->idea_status_id;
    }

    public function setStatus()
    {
        if (! Auth()->user()->hasPermissionTo('set idea status')){ 
            abort(Response::HTTP_FORBIDDEN); 
        }

        $this->idea->idea_status_id = $this->status;
        $this->idea->save();
        $this->emit('statusWasUpdated');
    }
    public function render()
    {
        return view('livewire.set-status');
    }
}