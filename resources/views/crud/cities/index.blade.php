<x-layouts.app title="CRUD - Városok listázása">
    <x-crud.layout lead="A mérnökeink oldalon megjelenő városok szerkesztése.">
        

        <x-table>
            <thead>
                <tr>
                    <x-table.th>ID</x-table.th>
                    <x-table.th>Név</x-table.th>
                    <x-table.th>Irányítószám</x-table.th>
                    <x-table.th>Ország kód</x-table.th>
                    <x-table.th>Utolsó módosítás</x-table.th>
                    <x-table.th class="text-right"><flux:button size="sm" variant="primary" color="green" icon="plus" :href="route('crud.cities.create')" wire:navigate>Új város hozzáadása</flux:button></x-table.th>
                </tr>
            </thead>
            <tbody>
            @foreach ($cities as $city)
                <tr>
                    <x-table.td>#{{ $city->id }}</x-table.td>
                    <x-table.td>{{ $city->name }}</x-table.td>
                    <x-table.td>{{ $city->postal_code }}</x-table.td>
                    <x-table.td>{{ $city->country_code }}</x-table.td>
                    <x-table.td>{{ $city->updated_at }}</x-table.td>
                    <x-table.td>
                        <flux:button.group class="justify-end">
                            <flux:button size="sm" icon="trash" variant="danger" title="Törlés" :href="route('crud.cities.destroy', $city->id)" wire:navigate></flux:button>
                            <flux:button size="sm" icon="pencil-square" :href="route('crud.cities.edit', $city->id)" wire:navigate>Szerkesztés</flux:button>
                        </flux:button.group>
                    </x-table.td>
                </tr>
            @endforeach
            </tbody>
        </x-table>

    </x-crud.layout>
</x-layouts.app>
