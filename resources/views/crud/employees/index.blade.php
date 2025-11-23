<x-layouts.app title="CRUD - Városok listázása">
    <x-crud.layout lead="A mérnökeink oldalon megjelenő telephelyek szerkesztése.">
        

        <x-table>
            <thead>
                <tr>
                    <x-table.th>ID</x-table.th>
                    <x-table.th>Név</x-table.th>
                    <x-table.th>Munkakör</x-table.th>
                    <x-table.th>Telefonszám</x-table.th>
                    <x-table.th>E-mail cím</x-table.th>
                    <x-table.th>Telephely</x-table.th>
                    <x-table.th>Utolsó módosítás</x-table.th>
                    <x-table.th class="text-right"><flux:button size="sm" variant="primary" color="green" icon="plus" :href="route('crud.employees.create')" wire:navigate>Új munkavállaló</flux:button></x-table.th>
                </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <x-table.td>#{{ $employee->id }}</x-table.td>
                    <x-table.td>{{ $employee->name }}</x-table.td>
                    <x-table.td>{{ $employee->title }}</x-table.td>
                    <x-table.td>{{ $employee->email }}</x-table.td>
                    <x-table.td>{{ $employee->phone }}</x-table.td>
                    <x-table.td><flux:link :href="route('crud.sites.edit', $employee->site->id)" wire:navigate>{{ $employee->site->id }}. sz.</flux:link></x-table.td>
                    <x-table.td>{{ $employee->updated_at }}</x-table.td>
                    <x-table.td>
                        <form method="POST" action="{{ route('crud.employees.destroy', $employee->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <flux:button.group class="justify-end">
                                <x-confirm :id="$employee->id">
                                    <flux:button size="sm" icon="trash" variant="danger" title="Törlés"></flux:button>
                                </x-confirm>
                                <flux:button size="sm" icon="pencil-square" :href="route('crud.employees.edit', $employee->id)" wire:navigate>Szerkesztés</flux:button>
                            </flux:button.group>
                        </form>
                    </x-table.td>
                </tr>
            @endforeach
            </tbody>
        </x-table>

    </x-crud.layout>
</x-layouts.app>
