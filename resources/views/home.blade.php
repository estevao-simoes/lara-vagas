<x-site.template>
    <x-site.nav>
        <x-site.hero />
    </x-site.nav>
    <main class="mt-16 container mx-auto px-3">
        @foreach ($i = [1, 2, 3, 4, 5, 6, 7, 10] as $number)
            <x-site.card :loop="$loop" />
        @endforeach
    </main>
    <x-site.footer />
</x-site.template>
