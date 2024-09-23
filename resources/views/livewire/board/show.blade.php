<div>
    <flux:heading size="xl">{{ $board->name }}</flux:heading>
    <flux:subheading>{{ $board->description }}</flux:subheading>

    <flux:card scrollable class="space-y-6 mt-8">
        <flux:modal.trigger name="list-add">
            <flux:button icon="plus">Add list</flux:button>
        </flux:modal.trigger>

        <div class="flex space-x-6">
            @foreach($board->listings as $listing)
                <livewire:listing.show :$listing :key="$listing->id" />
            @endforeach
        </div>
    </flux:card>

    <flux:modal name="list-add" variant="flyout" class="md:w-96">
        <form wire:submit="add" class="space-y-6">
            <div>
                <flux:heading size="lg">Add list</flux:heading>
            </div>

            <flux:input wire:model="name" label="Name" />

            <flux:input wire:model="color" type="color" label="Color" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Add list</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
