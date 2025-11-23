<x-layouts.app title="Üzenetek">
    <div class="mx-auto w-full [:where(&)]:max-w-7xl px-6 lg:px-8 flex flex-col">
        <x-card class="w-full flex">
            <p>Összesen {{ $messages->count() }} db üzenetet küldtek.</p>
            @foreach ($messages as $message)   
                <flux:separator variant="subtle" class="my-3"/>
                <div class="flex flex-cols gap-2">
                    <h3 class="text-xl font-bold">{{ $message->subject ?? '<em>Nincs tárgy</em>' }}</h3>
                    <p class="text-sm">Küldve: {{ $message->created_at }}</p>
                    <p class="text-sm">Feladó: {{ $message->user->name }} – E-mail címe: <flux:link :href="'mailto:' . $message->user->email">{{ $message->user->email }}</flux:link></p>
                    <p>{{ $message->message }}</p>
                </div> 
            @endforeach
        </x-card>
    </div>
</x-layouts.app>