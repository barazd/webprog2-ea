<x-layouts.app title="Üzenetek">
    <div class="mx-auto w-full [:where(&)]:max-w-7xl px-6 lg:px-8 flex flex-col">
        <x-card class="w-full flex">
            <p>Összesen {{ $messages->count() }} db üzenetet küldtek.</p>
            @foreach ($messages as $message)   
                <flux:separator variant="subtle" class="my-4"/>
                <div class="flex flex-col gap-2">
                    <h3 class="text-xl font-bold">{{ $message->subject ?? 'Nincs tárgy' }}</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Küldve: {{ $message->created_at }}</p>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Feladó: {{ $message->user->name }} – E-mail címe: <flux:link :href="'mailto:' . $message->user->email">{{ $message->user->email }}</flux:link></p>
                    <p>{{ $message->message }}</p>
                </div> 
            @endforeach
        </x-card>
    </div>
</x-layouts.app>