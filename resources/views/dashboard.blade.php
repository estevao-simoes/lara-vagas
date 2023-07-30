<x-site.template>
    <x-slot name="header">
        Minhas vagas
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                @if(session('success'))
                    <div class="p-6 text-success-600">
                        {{ session('success') }}
                    </div>
                @endif

                @livewire('list-jobs')

            </div>
        </div>
    </div>
</x-site.template>
