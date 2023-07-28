<x-site.template>
    
    <x-slot:hero>
        <x-site.hero />
    </x-slot>

    <div class="mt-16">
        @foreach ($listings as $job)
            <a href="{{ route('post-job.click', $job->id) }}" target="_blank">
                <x-site.card :loop="$loop" :job="$job" />
            </a>
        @endforeach
    </div>

</x-site.template>
