@props(['loop', 'listing'])

<div
    class="max-w-full md:max-w-4xl px-3 mx-auto {{ !$loop->first ? 'mt-6' : '' }} border border-gray-500 border-opacity-30 shadow hover:cursor-pointer hover:shadow-lg hover:border-prussian-blue">
    <a href="{{ route('post-job.click', $listing->id) }}" target="_blank">
        <div class="flex flex-col justify-center md:flex-row w-full h-60 md:h-36 p-3">
            <div class="flex flex-row items-center justify-self-start w-full md:w-1/2">
                <img src="{{ $listing->companyLogoUrl }}"
                    class="w-16 h-16 rounded-full border object-contain p-1 shadow-sm" 
                    alt="{{ $listing->company_name }}"
                >
                <div class="flex flex-col ml-3">
                    <div class="text-xs">
                        {{ $listing->company_name }}
                    </div>
                    <div class="font-extrabold">
                        {{ $listing->title }}
                    </div>
                    <div class="text-sm">
                        {{ $listing::CONTRACT_TYPES[$listing->contract_type] }} {{ $listing->salary ? ' - ' . $listing->salary : '' }}
                    </div>
                </div>
            </div>
            <div class="flex flex-row items-center w-full md:w-1/2 mt-3 md:mt-0">
                <div class="flex flex-col md:text-right w-full">
                    <div class="flex items-center md:justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 inline">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>

                        <span class="ml-1">
                            {{ $listing->posted_at?->diffForHumans() }}
                        </span>
                    </div>
                    <div class="flex items-center md:justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 inline">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        <span class="ml-1">
                            {{ $listing->location }}
                        </span>
                    </div>
                    <div>
                        @foreach ($listing->tags as $tag)
                            <span
                                class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 mt-2">
                                {{ $listing::getTag($tag) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
