<div class="mx-auto w-full [:where(&)]:max-w-7xl px-6 lg:px-8 flex flex-col">
    <x-card class="w-full flex">
        <div class="w-full">
            <flux:navbar class="pt-0">
                <flux:navbar.item :href="route('crud.cities.index')" :current="request()->routeIs('crud.cities.*')" wire:navigate>Városok</flux:navlist.item>
                <flux:navbar.item :href="route('crud.sites.index')" :current="request()->routeIs('crud.sites.*')" wire:navigate>Telephelyek</flux:navlist.item>
                <flux:navbar.item :href="route('crud.employees.index')" :current="request()->routeIs('crud.employees.*')" wire:navigate>Munkavállalók</flux:navlist.item>
            </flux:navbar>
        </div>

        <flux:separator class="mb-3" />

        <div class="flex-1 self-stretch max-md:pt-6">
            <p class="mt-2 mb-5">{{ $lead ?? '' }}</p>

            <div class="w-full">
                {{ $slot }}
            </div>
        </div>
    </x-card>
</div>