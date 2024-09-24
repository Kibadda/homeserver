<?php

namespace App\Livewire\Listing;

use App\Models\Listing;
use Flux\Flux;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Show extends Component
{
    public Listing $listing;

    #[Rule('required')]
    public string $name = '';
    #[Rule('hex_color|nullable')]
    public ?string $color = null;

    public function mount()
    {
        $this->name = $this->listing->name;
        $this->color = $this->listing->color;
    }

    public function render()
    {
        return view('livewire.listing.show');
    }

    public function edit()
    {
        $this->modal('listing-edit')->show();
    }

    public function update()
    {
        $this->validate();

        $this->listing->update([
            'name' => $this->name,
            'color' => $this->color,
        ]);

        $this->modal('listing-edit')->close();
    }

    public function remove()
    {
        $this->modal('listing-remove')->show();
    }

    #[Rule('required')]
    public string $taskName = '';
    public string $taskDescription = '';
    #[Rule('required')]
    public ?int $taskLabel = null;

    public function add()
    {
        $this->modal('task-add')->show();
    }

    public function create()
    {
        $this->validateOnly('taskName');
        $this->validateOnly('taskDescription');
        $this->validateOnly('taskLabel');

        $this->listing->tasks()->create([
            'name' => $this->taskName,
            'description' => $this->taskDescription,
            'label_id' => $this->taskLabel,
        ]);

        $this->reset('taskName', 'taskDescription', 'taskLabel');
        $this->modal('task-add')->close();
    }

    public function removeTask($id)
    {
        $this->listing->tasks()->findOrFail($id)->delete();

        Flux::modal('task-remove')->close();
    }
}
