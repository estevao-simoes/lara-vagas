<footer class="text-gray-700 bg-white body-font absolute bottom-0 md:w-full">
    <div class="flex items-center justify-center flex-col md:flex-row pb-8">
        <a href="{{ route('home') }}" class="text-xl font-black leading-none text-gray-900 select-none">
            <img src="{{ asset('img/logo.svg') }}" class="rounded-full w-11 h-11" alt="Laravagas">
        </a>
        <p class="text-sm text-center text-gray-500 sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-200">
            &copy; {{ now()->format('Y') }} Laravagas - Vagas no Brasil para desenvolvedores e desenvolvedoras
            Laravel.
        </p>
    </div>
</footer>
