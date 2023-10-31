<?php

namespace App\Livewire;

use App\Models\Poll;
use App\Models\Vote;
use App\Models\Option;
use Livewire\Component;
use Livewire\Attributes\On;

class Polls extends Component
{
    
    #[On('pollCreated')]
    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->get();

        return view('livewire.polls', compact('polls'));
    }

    public function vote(Option $option)
    {
        $option->votes()->create();
    }
}
