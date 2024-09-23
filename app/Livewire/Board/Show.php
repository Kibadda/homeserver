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

    #[Rule('required|hex_color')]
    public string $color = '';

    public function render()
    {
        return view('livewire.board.show');
    }

    public function add()
    {
        $this->validate();

        $this->board->listings()->create([
            'name' => $this->name,
            'color' => $this->color,
        ]);

        $this->reset('name', 'color');

        $this->modal('list-add')->close();
    }

    public function remove($id)
    {
        $this->board->listings()->findOrFail($id)->delete();

        Flux::modal('list-remove')->close();
    }
}
