<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Show extends Component
{
    public Task $task;

    #[Rule('required')]
    public string $name;
    public string $description;
    #[Rule('required')]
    public int $labelId;

    public function mount()
    {
        $this->name = $this->task->name;
        $this->description = $this->task->description;
        $this->labelId = $this->task->label->id;
    }

    public function render()
    {
        return view('livewire.task.show');
    }

    public function edit()
    {
        $this->modal('task-edit')->show();
    }

    public function update()
    {
        $this->validate();

        $this->task->update([
            'name' => $this->name,
            'description' => $this->description,
            'label_id' => $this->labelId,
        ]);

        $this->modal('task-edit')->close();
    }

    public function remove()
    {
        $this->modal('task-remove')->show();
    }
}
