<x-layouts.app title="Admin oldal">
    <div class="mx-auto w-full [:where(&)]:max-w-7xl px-6 lg:px-8 flex flex-1 flex-col gap-4">
        <x-card>
            <h3 class="text-2xl font-extrabold">Telephelyek eloszlása városonként</h3>
            <canvas id="myChart" class="my-10 sm:mx20 lg:mx-40"></canvas>
        </x-card>
    </div>

    <script type="module">
        const ctx = document.getElementById('myChart');

        const data = {!! $cities !!};

        new window.Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: data.map(o => o.name),
                datasets: [{
                    label: 'telephelyek száma',
                    data: data.map(o => o.sites_count),
                    borderWidth: 1
                }]
            },
        });
    </script>

</x-layouts.app>
