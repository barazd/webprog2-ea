@if (Session::has('success'))
    <div class="text-sm text-green-600 dark:text-green-300">
        {{ Session::get('success') }}
    </div>
@endif