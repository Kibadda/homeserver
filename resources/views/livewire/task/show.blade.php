<div>
    <flux:card class="space-y-6 min-w-72">
        <div class="flex justify-between items-center">
            <flux:heading>{{ $task->name }}</flux:heading>

            <flux:dropdown align="end">
                <flux:button icon="ellipsis-horizontal" variant="ghost" inset="top bottom" />

                <flux:menu>
                    <flux:menu.item wire:click="edit" icon="pencil">Edit</flux:menu.item>
                    <flux:menu.item wire:click="remove" icon="trash" variant="danger">Remove</flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </div>

        <flux:badge size="sm" style="background-color: {{ $task->label->color }};">{{ $task->label->name }}</flux:badge>
    </flux:card>

    <flux:modal name="task-edit" variant="flyout" class="md:w-96">
        <form wire:submit="update" class="space-y-6">
            <div>
                <flux:heading size="lg">Edit task</flux:heading>
            </div>

            <flux:input wire:model="name" label="Name" />

            <flux:textarea wire:model="description" label="Description" />

            <flux:select wire:model="labelId" variant="listbox" label="Label" searchable>
                @foreach($task->listing->board->labels as $label)
                    <flux:option value="{{ $label->id }}" style="color: {{ $label->color }};">{{ $label->name }}</flux:option>
                @endforeach
            </flux:select>

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save</flux:button>
            </div>
        </form>
    </flux:modal>

    <flux:modal name="task-remove" class="md:w-96">
        <form wire:submit="$parent.removeTask({{ $task->id }})" class="space-y-6">
            <div>
                <flux:heading size="lg">Remove task</flux:heading>

                <flux:subheading>
                    <p>You're about to remove this task.</p>
                    <p>This action cannot be reversed.</p>
                </flux:subheading>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="danger">Remove task</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
