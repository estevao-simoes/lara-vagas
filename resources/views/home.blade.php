<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>
        Laravags
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">
    <section class="w-full px-3 antialiased bg-gradient-to-br from-prussian-blue via-gray-900 to-gray-950 lg:px-6">
        <div class="mx-auto max-w-7xl">
            <nav class="flex items-center w-full h-24 select-none" x-data="{ showMenu: false }">
                <div
                    class="relative flex flex-wrap items-start justify-between w-full mx-auto font-medium md:items-center md:h-24 md:justify-between">
                    <a href="#_"
                        class="flex items-center w-1/4 py-4 pl-6 pr-4 space-x-2 font-extrabold text-white md:py-0 text-2xl">
                        <span
                            class="flex items-center justify-center flex-shrink-0 w-11 h-w-11 text-gray-900 rounded-full bg-gradient-to-br from-white via-gray-200 to-white">
                            <img src="{{ asset('img/logo.svg') }}" class="rounded-lg" alt="Laravagas">
                        </span>
                        <span>
                            Laravagas
                        </span>
                    </a>
                    <div class="fixed top-0 left-0 z-40 items-center w-full h-full p-3 text-sm bg-gray-900 bg-opacity-50 md:w-auto md:bg-transparent md:p-0 md:relative md:flex"
                        :class="{ 'flex': showMenu, 'hidden': !showMenu }">
                        <div
                            class="flex-col items-center w-full h-full p-3 overflow-hidden bg-black bg-opacity-50 rounded-lg select-none md:p-0 backdrop-blur-lg md:h-auto md:bg-transparent md:rounded-none md:relative md:flex md:flex-row md:overflow-auto">
                            <div
                                class="flex flex-col items-center justify-end w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                                <a href="#_"
                                    class="w-full py-5 mr-0 text-center text-gray-200 md:py-3 md:w-auto hover:text-white md:pl-0 md:mr-3 lg:mr-5">
                                    Login
                                </a>
                                <a href="#_"
                                    class="inline-flex items-center justify-center w-full px-4 py-3 md:py-1.5 font-medium leading-6 text-center whitespace-no-wrap transition duration-150 ease-in-out border border-transparent md:mr-1 text-gray-600 md:w-auto bg-white rounded-lg md:rounded-full hover:bg-white focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700">
                                    Postar Vaga
                                </a>
                            </div>
                        </div>
                    </div>
                    <div @click="showMenu = !showMenu"
                        class="absolute right-0 z-50 flex flex-col items-end translate-y-1.5 w-10 h-10 p-2 mt-3 mr-4 rounded-full cursor-pointer md:hidden hover:bg-gray-200/10 hover:bg-opacity-10"
                        :class="{ 'text-gray-400': showMenu, 'text-gray-100': !showMenu }">
                        <svg class="w-6 h-6" x-show="!showMenu" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" x-cloak>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </nav>
            <div class="container px-6 pt-11 md:pt-20 pb-24 mx-auto md:text-center md:px-4">
                <h1 class="font-extrabold leading-snug text-white text-4xl md:text-6xl xl:text-7xl">
                    <span class="block">
                        Plataforma de oportunidades
                    </span>
                    <span class="relative inline-block text-white md:mt-4">
                        <span class="text-vermilion">laravel</span> no Brasil
                    </span>
                </h1>
                <p class="mx-auto mt-10 md:mt-24 text-sm text-left text-gray-200 md:text-center sm:text-base md:max-w-xl md:text-lg xl:text-xl">
                    Inscreva-se para receber notificações de novas vagas de empresas que utilizam Laravel no Brasil.
                </p>
                <div class="flex items-center flex-col md:flex-row mx-auto mt-8 overflow-hidden text-left border border-gray-700 rounded-md md:max-w-md md:text-center">
                    <input 
                        type="text"
                        name="email"
                        placeholder="E-mail"
                        class="w-full h-12 px-3 md:px-6 py-2 text-sm md:text-base font-medium text-gray-800 focus:outline-none"
                    >
                    <span class="md:relative md:top-0 md:right-0 block w-full md:w-auto">
                        <button 
                            type="button"
                            class="inline-flex items-center justify-center w-full h-12 px-2 text-xs md:w-32 md:px-4 md:text-base font-bold leading-3 text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent hover:bg-gray-700 focus:outline-none active:bg-gray-700"
                            data-primary="gray-600"
                        >
                            Inscrever-se
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <main class="mt-16 container mx-auto px-3">
        @foreach ($i = [1, 2, 3, 4, 5, 6, 7, 10] as $number)
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>

                                <span class="ml-1">
                                    1 dia
                                </span>
                            </div>
                            <div class="flex items-center md:justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
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
        @endforeach
    </main>
    <footer class="text-gray-700 bg-white body-font">
        <div class="container flex items-center justify-center px-8 py-8 mx-auto flex-col md:flex-row">
            <a href="#_" class="text-xl font-black leading-none text-gray-900 select-none">
                <img src="{{ asset('img/logo.svg') }}" class="rounded-full w-11 h-11" alt="Laravagas">
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-200">
                &copy; {{ now()->format('Y') }} Laravagas - Vagas no Brasil para desenvolvedores e desenvolvedoras
                Laravel.
            </p>
        </div>
    </footer>
</body>

</html>
