<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreatePoll extends Component
{

    #[Rule('required|string|min:5|max:255')] //This method Rule for live validation
    public string $title;

    public array $options = ['First Option'];

    public function rules(): array
    {
        return [
            'options' => 'required|array|min:1|max:10',
            'options.*' => 'required|string|min:5|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'options.*.required' => 'Option field can\'t be empty',
        ];
    }

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        $this->validate();

        $poll = Poll::create([
            'title' => $this->title,
        ]);

        foreach ($this->options as $option) {
            $poll->options()->create([
                'name' => $option,
            ]);
        }

        $this->reset('title', 'options');

        $this->dispatch('pollCreated'); 
    }
}
