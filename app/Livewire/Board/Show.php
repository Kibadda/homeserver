<?php

namespace App\Livewire\Board;

use App\Models\Board;
use Flux\Flux;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Show extends Component
{
    public Board $board;

    #[Rule('required')]
    public string $name = '';
    public string $description = '';
    public bool $default = false;

    public function render()
    {
        return view('livewire.board.show');
    }

    public function mount()
    {
        $this->name = $this->board->name;
        $this->description = $this->board->description;
        $this->default = $this->board->default;
    }

    public function edit()
    {
        $this->modal('board-edit')->show();
    }

    public function update()
    {
        $this->validateOnly('name');

        $this->board->update([
            'name' => $this->name,
            'description' => $this->description,
            'default' => $this->default,
        ]);

        $this->modal('board-edit')->close();
    }

    #[Rule('required')]
    public string $listingName = '';
    #[Rule('hex_color|nullable')]
    public ?string $listingColor = null;

    public function add()
    {
        $this->validateOnly('listingName');
        $this->validateOnly('listingColor');

        $this->board->listings()->create([
            'name' => $this->listingName,
            'color' => $this->listingColor,
        ]);

        $this->reset('listingName', 'listingColor');

        $this->modal('listing-add')->close();
    }

    public function remove($id)
    {
        $this->board->listings()->findOrFail($id)->delete();

        Flux::modal('listing-remove')->close();
    }
}
