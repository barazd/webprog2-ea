<x-layouts.app title="Kapcsolat">
    <div class="mx-auto w-full [:where(&)]:max-w-7xl px-6 lg:px-8 flex flex-col">
        <x-card class="w-full flex">
            <p>Az alábbi űrlapon léphet kapcsolatba a központi ügyfélszolgálatunkkal.</p>
            <form method="POST" action="{{ route('messages.store') }}" class="my-6 w-full space-y-6">
                {{ csrf_field() }}
                {{ method_field('POST') }}

                <flux:input name="subject" :value="old('subject') ?? ''" label="Tárgy" type="text" autofocus autocomplete="subject" />

                <flux:textarea name="message" :value="old('message') ?? ''" label="Üzenet" required autocomplete="message" rows="auto" />
                
                @guest
                    <flux:input name="email" :value="old('email') ?? ''" label="E-mail cím" type="email" required autocomplete="email" description="Vendégként kötelező e-mail címet megadni!" /> 
                @endguest

                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" color="green" type="submit" class="w-full">Metés</flux:button>
                    </div>

                    <x-success-message />
                </div>
            </form>
        </x-card>
    </div>
</x-layouts.app>