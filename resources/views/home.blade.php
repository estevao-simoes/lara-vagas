<x-site.template>
    
    <x-slot:hero>
        <x-site.hero />
    </x-slot>

    <div class="mt-16">
        @foreach ($listings as $job)            
            <x-site.card :loop="$loop" :job="$job" />
        @endforeach
    </div>

</x-site.template>
