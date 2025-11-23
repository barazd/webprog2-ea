<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:header container
        class="border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 sm:m-6 lg:m-8 sm:rounded-xl">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-3" inset="left" />

        <!-- Fekvő menü -->
        <a href="{{ route('home') }}" class="ms-2 me-5 flex items-center space-x-2 rtl:space-x-reverse lg:ms-0"
            wire:navigate>
            <x-app-logo />
        </a>

        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item icon="home" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                Főoldal
            </flux:navbar.item>
            <flux:navbar.item icon="user-group" :href="route('engineers')" :current="request()->routeIs('engineers')" wire:navigate>Mérnökeink</flux:navbar.item>
            <flux:navbar.item icon="chat-bubble-bottom-center-text" :href="route('messages.create')" :current="request()->routeIs('messages.create')" wire:navigate>Kapcsolat</flux:navbar.item>
            @auth
                <flux:navbar.item icon="inbox" :href="route('messages.index')" :current="request()->routeIs('messages.index')" wire:navigate>Üzenetek</flux:navbar.item>
            @endauth
            <flux:navbar.item icon="chart-pie" href="#">Diagram</flux:navbar.item>
            <flux:navbar.item icon="table-cells" :href="route('crud.employees.index')" :current="request()->routeIs('crud.*')" wire:navigate>CRUD</flux:navbar.item>
            @auth
                @if (auth()->user()->hasRole('admin'))
                    <flux:navbar.item icon="adjustments-horizontal" :href="route('admin')" :current="request()->routeIs('admin')" wire:navigate>Admin</flux:navbar.item>
                @endif
            @endauth
            @guest
                <flux:separator vertical variant="subtle" class="my-2"/>
                @if (Route::has('register'))
                    <flux:navbar.item href="{{ route('register') }}" :current="request()->routeIs('register')">Regisztráció</flux:navbar.item>
                @endif
                <flux:navbar.item href="{{ route('login') }}" :current="request()->routeIs('login')">Bejelentkezés</flux:navbar.item>
            @endguest
        </flux:navbar>

        <flux:spacer />

        @auth
        <!-- Felhazsnálói fiók -->
        <flux:dropdown position="top" align="end">
            <flux:profile circle class="cursor-pointer" :initials="auth()->user()->initials()" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="grid flex-1 text-start text-sm leading-tight">
                            <span class="truncate font-semibold">Szerepkörök</span>
                            @foreach (auth()->user()->roles as $role)
                                <span class="truncate text-xs">{{ $role->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Beállítások') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Kijelentkezés') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
        @endauth
    </flux:header>

    <!-- Mobilos álló menü -->
    <flux:sidebar stashable sticky
        class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('home') }}" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Főmenü')">
                <flux:navbar.item icon="home" :href="route('home')" :current="request()->routeIs('home')"
                    wire:navigate>
                    Főoldal
                </flux:navbar.item>
                <flux:navbar.item icon="circle-stack" href="#">Adatbázis</flux:navbar.item>
                <flux:navbar.item icon="chat-bubble-bottom-center-text" href="#">Kapcsolat</flux:navbar.item>
                <flux:navbar.item icon="inbox" badge="12" href="#">Üzenetek</flux:navbar.item>
                <flux:navbar.item icon="chart-pie" href="#">Diagram</flux:navbar.item>
                <flux:navbar.item icon="table-cells" href="#">CRUD</flux:navbar.item>
                <flux:navbar.item icon="adjustments-horizontal" href="#">Admin</flux:navbar.item>
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />
    </flux:sidebar>

    {{ $slot }}

    @fluxScripts
</body>

</html>
