<x-site.template>
    <x-site.nav>
        <x-site.hero />
    </x-site.nav>
    <main class="mt-16 container mx-auto px-3">
        @foreach ($listings as $job)
        <a href="{{ route('post-job.click', $job->id) }}" target="_blank">
            <x-site.card :loop="$loop" :job="$job" />
        </a>
        @endforeach
    </main>
    <x-site.footer />
</x-site.template>
