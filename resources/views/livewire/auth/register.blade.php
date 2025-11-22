<x-layouts.app>
    <div class="flex flex-col items-center justify-center gap-6 sm:p-6 md:p-10">
        <x-card class="w-full sm:w-100">
            <div class="flex flex-col gap-6">
                <flux:heading size="xl">Regisztráció</flux:heading>

                <!-- Session Status -->
                <x-auth-session-status class="text-center" :status="session('status')" />

                <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
                    @csrf

                    <!-- Name -->
                    <flux:input name="name" label="Név" type="text" required autofocus autocomplete="name"
                        placeholder="Teljes név" />

                    <!-- Email Address -->
                    <flux:input name="email" label="E-mail cím" type="email" required autocomplete="email"
                        placeholder="email@example.com" />

                    <!-- Password -->
                    <flux:input name="password" label="Jelszó" type="password" required
                        autocomplete="new-password" placeholder="Jelszó" viewable />

                    <!-- Confirm Password -->
                    <flux:input name="password_confirmation" label="Jelszó megerősítése" type="password" required
                        autocomplete="new-password" placeholder="Jelszó megerősítése" viewable />

                    <div class="flex items-center justify-end">
                        <flux:button type="submit" variant="primary" class="w-full">
                            Új fiók létrehozása
                        </flux:button>
                    </div>
                </form>

                <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
                    <span>Már van fiókod?</span>
                    <flux:link :href="route('login')" wire:navigate>Jelentkezz be!</flux:link>
                </div>
            </div>
        </x-card>
    </div>
</x-layouts.app>
