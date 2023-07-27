<div class="w-full">
    <form wire:submit.prevent="subscribe"
        class="flex items-center flex-col md:flex-row mx-auto mt-8 overflow-hidden text-left border border-gray-700 rounded-md md:max-w-md md:text-center">
        <input wire:model.lazy="email" type="text" name="email" placeholder="E-mail"
            class="w-full h-12 px-3 md:px-6 py-2 text-sm md:text-base font-medium text-gray-800 focus:outline-none">
        <span class="md:relative md:top-0 md:right-0 block w-full md:w-auto">
            <button type="submit"
                class="inline-flex items-center justify-center w-full h-12 px-2 text-xs md:w-32 md:px-4 md:text-base font-bold leading-3 text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent hover:bg-gray-700 focus:outline-none active:bg-gray-700"
                data-primary="gray-600">
                Inscrever-se
            </button>
        </span>
    </form>
    <div class="mt-2">
        @error('email')
            <span class="w-full text-left text-vermilion">{{ $message }}</span>
        @enderror
    </div>
</div>
