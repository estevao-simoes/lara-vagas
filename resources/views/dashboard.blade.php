<x-site.template>
    <x-navigation/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session('success'))
                    <div class="p-6 text-success-600">
                        {{ session('success') }}
                    </div>
                @else
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-site.template>

