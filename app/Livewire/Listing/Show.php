<?php

namespace App\Livewire\Listing;

use App\Models\Listing;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Show extends Component
{
    public Listing $listing;

    #[Rule('required')]
    public string $name = '';

    #[Rule('required|hex_color')]
    public string $color = '';

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
        $this->modal('list-edit')->show();
    }

    public function update()
    {
        $this->validate();

        $this->listing->update([
            'name' => $this->name,
            'color' => $this->color,
        ]);

        $this->modal('list-edit')->close();
    }

    public function remove()
    {
        $this->modal('list-remove')->show();
    }
}
