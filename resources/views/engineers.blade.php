<x-layouts.app title="Mérnökeink">
    <div class="mx-auto w-full [:where(&)]:max-w-7xl sm:px-6 lg:px-8 flex flex-1 flex-col gap-4">
        <h2 class="text-2xl font-extrabold">A mérnökeink</h2>
        <p>Cégünket az ország számos pontján, több telephelyen is megtalálhatja. Lépjen kapcsolatba az Önhöz legközelebbi telephelyen dolgozó mérnökeinkkel!</p>
        <p><em>Ez az oldal az <code>Adatbázis menü</code> feladatban kérteknek megfelelője.</em></p>

        @foreach ($engineersTree as $city)
            <x-card>
                <h2 class="text-2xl font-extrabold mb-6">{{ $city->name }}</h2>

                @foreach ($city->sites as $site)
                    <h3 class="text-xl font-bold text-red-600 dark:text-red-300">{{ $site->id }}. számú telephely</h3>
                    <p>Cím: {{ $site->address }}</p>
                    <p>Központi telefon: {{ $site->phone }} – Központi e-mail cím: {{ $site->email }}</p>

                    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4 my-6">
                        @foreach ($site->employees as $employee)
                            <div class="p-4 border border-neutral-300 dark:border-neutral-600 rounded-lg">
                                <h4 class="text-md font-bold">{{ $employee->name }}</h4>
                                <p class="italic dark:text-neutral-300 text-neutral-600">{{ $employee->title }}</p>
                                <p class="text-sm w-full inline-flex gap-1"><flux:icon.phone variant="micro" class="dark:text-neutral-300 text-neutral-600" /> {{ $employee->phone }}</p>
                                <p class="text-sm w-full inline-flex gap-1"><flux:icon.envelope variant="micro" class="dark:text-neutral-300 text-neutral-600" /> {{ $employee->email }}</p>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </x-card>
        @endforeach

    </div>
</x-layouts.app>
