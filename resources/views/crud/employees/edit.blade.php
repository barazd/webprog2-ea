<x-layouts.app :title="'CRUD - ' . (($method == 'PUT') ? ($employee->name . ' munkavállaló szerkesztése') : 'Új munkavállaló hozzáadása')">
    <x-crud.layout :lead="'A mérnökeink oldalon megjelenő ' . (($method == 'PUT') ? ($employee->name . ' munkavállaló szerkesztése') : 'új munkavállaló hozzáadása')">
        <form method="POST" action="{{ ($method == 'POST') ? route('crud.employees.store') : route('crud.employees.update', $employee->id) }}" class="my-6 w-full space-y-6">
            {{ csrf_field() }}
            {{ method_field($method) }}

            @if ($method == 'PUT')
            <flux:input name="id" :value="$employee->id" label="ID" type="number" required  disabled />
            @endif

            <flux:input name="name" :value="old('name') ?? $employee->name ?? ''" label="Név" type="text" required autofocus autocomplete="name" />

            <flux:input name="title" :value="old('title') ?? $employee->title ?? ''" label="Munkakör" type="text" required autocomplete="title" />

            <flux:input name="phone" :value="old('phone') ?? $employee->phone ?? ''" label="Központi telefonszám" type="text" autocomplete="phone" required />

            <flux:input name="email" :value="old('email') ?? $employee->email ?? ''" label="Központi e-mail cím" type="email" autocomplete="email" required /> 
                
            <flux:select name="site_id" label="Telephely" placeholder="Telephely választása...">
                @foreach ($sites as $site)
                    <flux:select.option value="{{ $site->id }}" :selected="((old('site_id') ?? $employee->site_id ?? 0) == $site->id)">
                        {{ $site->id }}. sz. telephely ({{ $site->city->name }}, {{ $site->address }})
                    </flux:select.option>
                @endforeach
            </flux:select>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" color="green" type="submit" class="w-full">Metés</flux:button>
                </div>

                <x-success-message />
            </div>
        </form>
    </x-crud.layout>
</x-layouts.app>