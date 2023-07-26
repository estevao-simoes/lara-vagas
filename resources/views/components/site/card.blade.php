<div
    class="max-w-full md:max-w-4xl px-3 mx-auto {{ !$loop->first ? 'mt-6' : '' }} border border-gray-500 border-opacity-30 shadow hover:cursor-pointer hover:shadow-lg hover:border-prussian-blue">
    <div class="flex flex-col justify-center md:flex-row w-full h-60 md:h-36 p-3">
        <div class="flex flex-row items-center justify-self-start w-full md:w-1/2">
            <img src="https://logodownload.org/wp-content/uploads/2017/09/bayer-logo-8.png"
                class="w-16 h-16 rounded-full border object-cover p-1 shadow-sm" alt="Bayer">
            <div class="flex flex-col ml-3">
                <div class="text-xs">
                    Cloudmazing B.V.
                </div>
                <div class="font-extrabold">
                    FULL STACK DEVELOPER
                </div>
                <div class="text-sm">
                    Full Time - <span class="">R$ 10.000,00</span>
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
                        1 dia
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
                        São Paulo, SP
                    </span>
                </div>
                <div>
                    @foreach (\App\Models\Jobs\Listing::getTags()->random(5) as $tag)
                        <span
                            class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 mt-2">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
