<x-layouts.app :title="'CRUD - ' . (($method == 'PUT') ? ($city->name . ' város szerkesztése') : 'Új város hozzáadása')">
    <x-crud.layout :lead="'A mérnökeink oldalon megjelenő ' . (($method == 'PUT') ? ($city->name . ' város szerkesztése') : 'új város hozzáadása')">
        <form method="POST" action="{{ ($method == 'POST') ? route('crud.cities.store') : route('crud.cities.update', $city->id) }}" class="my-6 w-full space-y-6">
            {{ csrf_field() }}
            {{ method_field($method) }}

            @if ($method == 'PUT')
            <flux:input name="id" :value="$city->id" label="ID" type="number" required  disabled />
            @endif

            <flux:input name="name" :value="old('name') ?? $city->name ?? ''" label="Név" type="text" required autofocus autocomplete="name" />

            <flux:input name="postal_code" :value="old('postal_code') ?? $city->postal_code ?? ''" label="Irányítószám" type="number" required autocomplete="postal_code" />

            <flux:input name="country_code" :value="old('country_code') ?? $city->country_code ?? ''" label="Országkód" type="text" required autocomplete="country_code" />     

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" color="green" type="submit" class="w-full">Metés</flux:button>
                </div>

                <x-success-message />
            </div>
        </form>
    </x-crud.layout>
</x-layouts.app>