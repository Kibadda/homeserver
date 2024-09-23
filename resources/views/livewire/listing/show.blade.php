<div>
    <flux:card class="space-y-6 border-[{!! $listing->color !!}]">
        <div class="flex justify-between items-center">
            <flux:heading>{{ $listing->name }}</flux:heading>

            <flux:dropdown align="end">
                <flux:button icon="ellipsis-horizontal" variant="ghost" inset="top bottom" />

                <flux:menu>
                    <flux:menu.item wire:click="edit" icon="pencil">Edit</flux:menu.item>
                    <flux:menu.item wire:click="remove" icon="trash" variant="danger">Remove</flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </div>

        <flux:separator />

        <div class="space-y-6">
            <flux:input label="Email" type="email" placeholder="Your email address" />

            <flux:field>
                <flux:label class="flex justify-between">
                    Password

                    <flux:link href="#" variant="subtle">Forgot password?</flux:link>
                </flux:label>

                <flux:input type="password" placeholder="Your password" />

                <flux:error name="password" />
            </flux:field>
        </div>

        <div class="space-y-2">
            <flux:button variant="primary" class="w-full">Log in</flux:button>

            <flux:button variant="ghost" class="w-full">Sign up for a new account</flux:button>
        </div>
    </flux:card>

    <flux:modal name="list-edit" variant="flyout" class="md:w-96">
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

    <flux:modal name="list-remove" class="md:w-96">
        <form wire:submit="$parent.remove({{ $listing->id }})" class="space-y-6">
            <div>
                <flux:heading size="lg">Remove listing</flux:heading>

                <flux:subheading>
                    <p>You're about to remove this listing.</p>
                    <p>This action cannot be reversed.</p>
                </flux:subheading>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="danger">Remove listing</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
