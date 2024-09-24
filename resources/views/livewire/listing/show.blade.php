<div class="grow">
    <flux:card class="space-y-6 min-w-72 h-full" style="border-color: {{ $listing->color }};">
        <div class="flex justify-between items-center">
            <flux:heading>{{ $listing->name }}</flux:heading>

            <flux:dropdown align="end">
                <flux:button icon="ellipsis-horizontal" variant="ghost" inset="top bottom" />

                <flux:menu>
                    <flux:menu.item wire:click="edit" icon="pencil">Edit</flux:menu.item>
                    <flux:menu.item wire:click="remove" icon="trash" variant="danger">Remove</flux:menu.item>
                    <flux:separator class="my-2" />
                    <flux:menu.item wire:click="add" icon="plus">Add task</flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </div>

        <flux:separator />

        <div class="flex flex-col overflow-y-auto space-y-6 grow">
            @foreach($listing->tasks as $task)
                <livewire:task.show :$task :key="$task->id" />
            @endforeach
        </div>
    </flux:card>

    <flux:modal name="listing-edit" variant="flyout" class="md:w-96">
        <form wire:submit="update" class="space-y-6">
            <div>
                <flux:heading size="lg">Edit list</flux:heading>
            </div>

            <flux:input wire:model="name" label="Name" />

            <flux:input wire:model="color" type="color" label="Color" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save</flux:button>
            </div>
        </form>
    </flux:modal>

    <flux:modal name="listing-remove" class="md:w-96">
        <form wire:submit="$parent.remove({{ $listing->id }})" class="space-y-6">
            <div>
                <flux:heading size="lg">Remove list</flux:heading>

                <flux:subheading>
                    <p>You're about to remove this list.</p>
                    <p>This action cannot be reversed.</p>
                </flux:subheading>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="danger">Remove list</flux:button>
            </div>
        </form>
    </flux:modal>

    <flux:modal name="task-add" variant="flyout" class="md:w-96">
        <form wire:submit="create" class="space-y-6">
            <div>
                <flux:heading size="lg">Add task</flux:heading>
            </div>

            <flux:input wire:model="taskName" label="Name" />

            <flux:textarea wire:model="taskDescription" label="Description" />

            <flux:select wire:model="taskLabel" variant="listbox" label="Label" searchable>
                @foreach($listing->board->labels as $label)
                    <flux:option value="{{ $label->id }}" style="color: {{ $label->color }};">{{ $label->name }}</flux:option>
                @endforeach
            </flux:select>

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
