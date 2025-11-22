<x-layouts.app :title="__('Kezdőlap')">
    <div class="mx-auto w-full [:where(&)]:max-w-7xl px-6 lg:px-8 flex flex-1 flex-col gap-4">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="relative">
                <img class="w-full" src="/storage/sven-daniel-DV_rG1mjDxs-unsplash.webp" alt="" />
                <div class="absolute text-center w-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-6 sm:px-10 flex flex-col gap-6 sm:gap-10">
                    <h1 class="text-3xl sm:text-4xl lg:text-6xl font-extrabold text-white text-shadow-md ">DrillThrough Kft. – az egykapus megoldás a fémmegmunkálásban</h1>
                    <p>
                        <flux:button variant="primary" color="amber" icon="user-group">Mérnökeink</flux:button>
                        <flux:button variant="primary" color="zinc" icon="chat-bubble-bottom-center-text">Kapcsolat</flux:button>
                    </p>
                </div>
            </div>
        </div>
        <div class="cl">
            <h1 class="sm:text-4xl text-5xl font-serif italic my-20 text-center text-neutral-700 dark:text-neutral-200">„Minden fém egy lehetőség, minden projekt egy kihívás.”</h1>
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <img src="/storage/greg-rosenke-b9IDXH4XW5M-unsplash.webp" alt="" class="w-full" />
                <div class="m-4 flex flex-col gap-4">
                    <h3 class="text-2xl font-extrabold">Precízió</h3>
                    <p>Magas szintű minőségbiztosítási rendszert üzemeltetünk, minden munkadarab mérethelyességét kétszer ellenőrizzük.</p>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <img src="/storage/greg-rosenke-xoxnfVIE7Qw-unsplash.webp" alt="" class="w-full" />
                <div class="m-4 flex flex-col gap-4">
                    <h3 class="text-2xl font-extrabold">Nincsennek korlátok</h3>
                    <p>Nem ismerünk lehetetlent, bármilyen fémet, bármilyen módszerrel meg tudunk munkálni.</p>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <img src="/storage/mastars-cJpvBX_gNrg-unsplash.webp" alt="" class="w-full" />
                <div class="m-4 flex flex-col gap-4">
                    <h3 class="text-2xl font-extrabold">End-to-end megoldások</h3>
                    <p>A tervezéstől a szállításig vállaljuk a teljes a gyártási folyamat felügyeletét.</p>
                </div>
            </div>
        </div>
        
    </div>
</x-layouts.app>
