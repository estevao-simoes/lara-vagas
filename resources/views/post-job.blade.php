<x-site.template>
    <x-slot name="header">
        {{ 'Postar vaga' }}
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @livewire('post-job-form')
    </div>
</x-site.template>
