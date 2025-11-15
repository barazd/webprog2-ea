<x-layouts.app>
    <div class="flex flex-col items-center justify-center gap-6 sm:p-6 md:p-10">
        <x-card class="w-full sm:w-100">
            <div class="flex flex-col gap-6">
                <flux:heading size="xl">Bejelentkezés</flux:heading>

                <!-- Session Status -->
                <x-auth-session-status class="text-center" :status="session('status')" />

                <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
                    @csrf

                    <!-- Email Address -->
                    <flux:input name="email" label="E-mail cím" type="email" required autofocus
                        autocomplete="email" placeholder="email@example.com" />

                    <!-- Password -->
                    <div class="relative">
                        <flux:input name="password" label="Jelszó" type="password" required
                            autocomplete="current-password" placeholder="Jelszó" viewable />
                    </div>

                    <!-- Remember Me -->
                    <flux:checkbox name="remember" label="Jegyezz meg!" :checked="old('remember')" />

                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full" data-test="login-button">
                            Bejelentkezés
                        </flux:button>
                    </div>
                </form>

                @if (Route::has('register'))
                    <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
                        <span>Nincs felhasználói fiókod?</span>
                        <flux:link :href="route('register')" wire:navigate>Regisztrálj!</flux:link>
                    </div>
                @endif
            </div>
        </x-card>
    </div>
</x-layouts.app>
