<section class="w-full px-3 antialiased bg-gradient-to-br from-prussian-blue via-gray-900 to-gray-950 lg:px-6" x-data="{ open: false }">
    <div class="mx-auto max-w-7xl">
        <nav class="flex items-center w-full h-24 select-none">
            <div
                class="relative flex flex-wrap items-start justify-between w-full mx-auto font-medium md:items-center md:h-24 md:justify-between">
                <a href="{{ route('home') }}"
                    class="flex items-center w-1/4 py-4 pl-6 pr-4 space-x-2 font-extrabold text-white md:py-0 text-2xl">
                    <span
                        class="flex items-center justify-center flex-shrink-0 w-11 h-w-11 text-gray-900 rounded-full bg-gradient-to-br from-white via-gray-200 to-white">
                        <img src="{{ asset('img/logo.svg') }}" class="rounded-lg" alt="Laravagas">
                    </span>
                    <span>
                        Laravagas
                    </span>
                </a>
                <div class="z-40 items-center h-full text-sm hidden md:relative md:flex">
                    <div
                        class="flex-col items-center w-full h-full p-3 bg-black bg-opacity-50 rounded-lg select-none md:p-0 backdrop-blur-lg md:h-auto md:bg-transparent md:rounded-none md:relative md:flex md:flex-row">
                        <div
                            class="flex flex-col items-center justify-end w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                            @auth
                                <div class="hidden sm:flex sm:items-center sm:ml-6">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button
                                                class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium text-gray-200 hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                <div>{{ Auth::user()->name }}</div>

                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('dashboard')">
                                                Minhas vagas
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}"
                                    class="w-full py-5 mr-0 text-center text-gray-200 md:py-3 md:w-auto hover:text-white md:pl-0 md:mr-3 lg:mr-5">
                                    Login
                                </a>
                            @endguest
                            <a href="{{ route('post-job.view') }}"
                                class="inline-flex items-center justify-center w-full px-4 py-3 md:py-1.5 font-medium leading-6 text-center whitespace-no-wrap transition duration-150 ease-in-out border border-transparent md:mr-1 text-gray-600 md:w-auto bg-white rounded-lg md:rounded-full hover:bg-white focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700">
                                Postar Vaga
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>

        </nav>
            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden items-center h-full text-sm">
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-400">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-400">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="font-medium text-sm text-gray-500">
                            {{ Auth::user()->email }}
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        {{-- <div class="pt-2 pb-3 space-y-1"> --}}
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            Minhas Vagas
                        </x-responsive-nav-link>
                        {{-- </div>         --}}
                        <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
        {{ $slot }}
    </div>
</section>
