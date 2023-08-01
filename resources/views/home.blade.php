<x-site.template>
    
    <x-slot:hero>
        <x-site.hero />
    </x-slot>

    <div class="mt-16">
        @foreach ($listings as $listing)            
            <x-site.card :loop="$loop" :listing="$listing" />
        @endforeach
    </div>

</x-site.template>
