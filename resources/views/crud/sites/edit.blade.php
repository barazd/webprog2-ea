<x-layouts.app :title="'CRUD - ' . (($method == 'PUT') ? ($site->id . '. sz. telephely szerkesztése') : 'Új telephely hozzáadása')">
    <x-crud.layout :lead="'A mérnökeink oldalon megjelenő ' . (($method == 'PUT') ? ($site->id . '. számú telephely szerkesztése') : 'új telephely hozzáadása')">
        <form method="POST" action="{{ ($method == 'POST') ? route('crud.sites.store') : route('crud.sites.update', $site->id) }}" class="my-6 w-full space-y-6">
            {{ csrf_field() }}
            {{ method_field($method) }}

            @if ($method == 'PUT')
            <flux:input name="id" :value="$site->id" label="ID" type="number" required  disabled />
            @endif

            <flux:input name="address" :value="old('address') ?? $site->address ?? ''" label="Cím" type="text" required autofocus autocomplete="address" />

            <flux:input name="phone" :value="old('phone') ?? $site->phone ?? ''" label="Központi telefonszám" type="text" autocomplete="phone" />

            <flux:input name="email" :value="old('email') ?? $site->email ?? ''" label="Központi e-mail cím" type="email" autocomplete="email" /> 
                
            <flux:select name="city_id" label="Város" placeholder="Város választása...">
                @foreach ($cities as $city)
                    <flux:select.option value="{{ $city->id }}" :selected="((old('city_id') ?? $site->city_id ?? 0) == $city->id)" class="">
                        {{ $city->name }}
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