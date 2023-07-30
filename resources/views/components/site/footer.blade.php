<footer class="text-gray-700 bg-white body-font absolute bottom-0 w-full">
    <div class="max-w-fit mx-auto">
        <div class="container flex items-center justify-center px-3 md:px-8 py-8 mx-auto flex-col md:flex-row">
            <a href="{{ route('home') }}" class="text-xl font-black leading-none text-gray-900 select-none">
                <img src="{{ asset('img/logo.svg') }}" class="rounded-full w-11 h-11" alt="Laravagas">
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-200">
                &copy; {{ now()->format('Y') }} Laravagas - Vagas no Brasil para desenvolvedores e desenvolvedoras
                Laravel.
            </p>
        </div>
    </div>
</footer>