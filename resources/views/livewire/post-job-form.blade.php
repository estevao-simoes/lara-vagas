<form wire:submit.prevent="create" class="mt-12 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <div class="mb-10">
        {{ $this->form }}
    </div>

    <button type="submit" class="rounded-md text-center w-full h-12 px-2 text-xs md:px-4 md:text-base font-bold leading-3 text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent hover:bg-gray-700 focus:outline-none active:bg-gray-700">
        Pagar R$10,00 e publicar
    </button>

    <p class="text-2xl font-extrabold my-11">
        Prévia do anúncio
    </p>

    <div x-data="{
        title: @entangle('title').defer,
        location: @entangle('location').defer,
        contract_type: @entangle('contract_type').defer,
        url: @entangle('url').defer,
        company_name: @entangle('company_name').defer,
        salary: @entangle('salary').defer,
        tags: @entangle('tags').defer,
        contractTypeName(value){
            return {
                FULL_TIME: 'Tempo integral',
                PART_TIME: 'Meio período',
                CONTRACTOR: 'Consultor',
                TEMPORARY: 'Temporário',
                INTERN: 'Estagiário',
                VOLUNTEER: 'Voluntário',
                PER_DIEM: 'Por dia',
                OTHER: 'Outro'
            }[value]
        },
        tagName(index){
            return @js(App\Models\Jobs\Listing::getTags()->toArray())[index]
        }
    }">
        <div class="max-w-full md:max-w-4xl px-3 mx-auto mt-6 border border-gray-500 border-opacity-30 shadow hover:cursor-pointer hover:shadow-lg hover:border-prussian-blue">
    
            <div class="flex flex-col justify-center md:flex-row w-full h-60 md:h-36 p-3">
                <div class="flex flex-row items-center justify-self-start w-full md:w-1/2">
                    <img src="{{ $company_logo ? $company_logo[array_key_first($company_logo)]->temporaryUrl() : asset('img/fallback-brand.svg') }}"
                        class="w-16 h-16 rounded-full border object-contain p-1 shadow-sm" 
                        alt="{{ $company_name }}"
                    >
                    <div class="flex flex-col ml-3">
                        <div class="text-xs" x-text="company_name"></div>
                        <div class="font-extrabold" x-text="title"></div>
                        <div class="text-sm">
                            <span x-text="contractTypeName(contract_type)"></span>
                            <span x-show="salary != ''"> - </span>
                            <span x-text="salary"></span>
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
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <span class="ml-1" x-text="location"></span>
                        </div>
                        <div>
                            <template x-for="(tag, index) in tags" :key="index">
                                <span :class="index != 0 ? 'ml-2' : ''" class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 mt-2" x-text="tagName(tag)"></span>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</form>

