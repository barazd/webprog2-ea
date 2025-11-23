<x-layouts.app title="CRUD - Városok listázása">
    <x-crud.layout lead="A mérnökeink oldalon megjelenő munkavállalók szerkesztése.">
        

        <x-table>
            <thead>
                <tr>
                    <x-table.th>ID</x-table.th>
                    <x-table.th>Név</x-table.th>
                    <x-table.th>Cím</x-table.th>
                    <x-table.th>Központi telefon</x-table.th>
                    <x-table.th>Központi e-mail</x-table.th>
                    <x-table.th>Város</x-table.th>
                    <x-table.th>Utolsó módosítás</x-table.th>
                    <x-table.th class="text-right"><flux:button size="sm" variant="primary" color="green" icon="plus" :href="route('crud.sites.create')" wire:navigate>Új telephely</flux:button></x-table.th>
                </tr>
            </thead>
            <tbody>
            @foreach ($sites as $site)
                <tr>
                    <x-table.td>#{{ $site->id }}</x-table.td>
                    <x-table.td><strong>{{ $site->id }}. sz. telephely</strong></x-table.td>
                    <x-table.td>{{ $site->address }}</x-table.td>
                    <x-table.td>{{ $site->phone }}</x-table.td>
                    <x-table.td>{{ $site->email }}</x-table.td>
                    <x-table.td><flux:link :href="route('crud.cities.edit', $site->city->id)" wire:navigate>{{ $site->city->name }}</flux:link></x-table.td>
                    <x-table.td>{{ $site->updated_at }}</x-table.td>
                    <x-table.td>
                        <form method="POST" action="{{ route('crud.sites.destroy', $site->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <flux:button.group class="justify-end">
                                <x-confirm :id="$site->id">
                                    <flux:button size="sm" icon="trash" variant="danger" title="Törlés"></flux:button>
                                </x-confirm>
                                <flux:button size="sm" icon="pencil-square" :href="route('crud.sites.edit', $site->id)" wire:navigate>Szerkesztés</flux:button>
                            </flux:button.group>
                        </form>
                    </x-table.td>
                </tr>
            @endforeach
            </tbody>
        </x-table>

    </x-crud.layout>
</x-layouts.app>
