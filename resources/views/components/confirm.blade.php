@props([
    'id',
    'title',
    'description'
])

<flux:modal.trigger :name="'confirm-' . ($id ?? '0')">
    {{ $slot }}
</flux:modal.trigger>

<flux:modal :name="'confirm-' . ($id ?? '0')" class="min-w-[22rem]">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">{{ $title ?? 'Biztosan törlöd?' }}</flux:heading>

            <flux:text class="mt-2">
                {{ $description ?? '' }}
            </flux:text>
        </div>

        <div class="flex gap-2">
            <flux:spacer />

            <flux:modal.close>
                <flux:button variant="ghost">Mégsem</flux:button>
            </flux:modal.close>

            <flux:button type="submit" variant="danger">Törlés</flux:button>
        </div>
    </div>
</flux:modal>