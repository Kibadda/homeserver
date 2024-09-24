<div class="h-full flex flex-col">
    <div class="flex justify-between items-center">
        <div>
            <flux:heading size="xl">{{ $board->name }}</flux:heading>
            <flux:subheading>{{ $board->description }}</flux:subheading>
        </div>

        <flux:dropdown align="end">
            <flux:button icon="ellipsis-horizontal" variant="ghost" inset="top bottom" />

            <flux:menu>
                <flux:menu.item wire:click="edit" icon="pencil">Edit</flux:menu.item>
                <flux:menu.item wire:click="remove" icon="trash" variant="danger">Remove</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </div>

    <flux:card class="space-y-6 mt-8 grow flex flex-col">
        <flux:modal.trigger name="listing-add">
            <flux:button icon="plus">Add list</flux:button>
        </flux:modal.trigger>

        <div class="flex space-x-6 overflow-x-auto grow">
            @foreach($board->listings as $listing)
                <livewire:listing.show :$listing :key="$listing->id" />
            @endforeach
        </div>
    </flux:card>

    <flux:modal name="board-edit" variant="flyout" class="md:w-96">
        <form wire:submit="update" class="space-y-6">
            <div>
                <flux:heading size="lg">Edit board</flux:heading>
            </div>

            <flux:input wire:model="name" label="Name" />

            <flux:textarea wire:model="description" label="Description" resize="vertical" />

            <flux:checkbox wire:model="default" label="Default board" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save</flux:button>
            </div>
        </form>
    </flux:modal>

    <flux:modal name="listing-add" variant="flyout" class="md:w-96">
        <form wire:submit="add" class="space-y-6">
            <div>
                <flux:heading size="lg">Add list</flux:heading>
            </div>

            <flux:input wire:model="listingName" label="Name" />

            <flux:input wire:model="listingColor" type="color" label="Color" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Add list</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
