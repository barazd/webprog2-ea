<x-layouts.app title="Mérnökeink">
    <x-crud.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <h2 class="text-2xl font-extrabold">A mérnökeink</h2>
        <p>Cégünket az ország számos pontján, több telephelyen is megtalálhatja. Lépjen kapcsolatba az Önhöz legközelebbi telephelyen dolgozó mérnökeinkkel!</p>
        <p><em>Ez az oldal az <code>Adatbázis menü</code> feladatban kérteknek megfelelője.</em></p>

        @foreach ($cities as $city)
            <x-card>
                <h2 class="text-2xl font-extrabold mb-6">{{ $city->name }}</h2>

            </x-card>
        @endforeach

    </x-crud.layout>
</x-layouts.app>
