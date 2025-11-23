<x-layouts.app :title="'CRUD - Város szerkesztése: ' . $city->name">
    <x-crud.layout lead="A mérnökeink oldalon megjelenő városok szerkesztése.">
        <form wire:submit="updateCity" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" label="Név" type="text" required autofocus autocomplete="name" />

            <flux:input wire:model="postal_code" label="E-mail cím" type="number" required autocomplete="postal_code" />

            <flux:input wire:model="country_code" label="E-mail cím" type="text" required autocomplete="country_code" />

            <flux:input wire:model="email" label="E-mail cím" type="email" required autocomplete="email" />

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">Metés</flux:button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    Mentve.
                </x-action-message>
            </div>
        </form>
    </x-crud.layout>
</x-layouts.app>