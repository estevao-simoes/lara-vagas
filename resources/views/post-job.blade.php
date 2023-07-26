<x-site.template>
    <x-site.nav />
    <main class="mt-16 container mx-auto px-3">
        <div class="max-w-full md:max-w-4xl px-3 mx-auto">
            @livewire('post-job-form')
        </div>
    </main>
    <x-site.footer />
</x-site.template>
