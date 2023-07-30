<section x-data="{ open: false }" class="hidden bg-white border-b border-gray-100 sm:block">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto pl-9 md:pl-6">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ 'Minhas vagas' }}
                    </x-nav-link>
                    <x-nav-link class="ml-4" :href="route('post-job.view')" :active="request()->routeIs('post-job.view')">
                        {{ 'Postar Vaga' }}
                    </x-nav-link>
                    <x-nav-link class="ml-4" :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        {{ __('Profile') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>

</section>
