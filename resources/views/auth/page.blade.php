<x-site.template>
    
    <div class="w-full flex justify-center items-center mt-28">

        <div 
            class="relative w-96" 
            x-data="{
                tabSelected: 'login',
                tabButtonClicked(tab) {
                    this.tabSelected = tab;
                    window.location.hash = tab;
                    this.tabRepositionMarker(tab);
                },
                tabRepositionMarker(tabButton) {
                    tabButton = tabButton == 'login' ? this.$refs.login : this.$refs.register;

                    this.$refs.tabMarker.style.width = tabButton.offsetWidth + 'px';
                    this.$refs.tabMarker.style.height = tabButton.offsetHeight + 'px';
                    this.$refs.tabMarker.style.left = tabButton.offsetLeft + 'px';
                }
            }" 
            x-init="
                tabSelected = window.location.hash ? window.location.hash.replace('#', '') : 'login';
                tabRepositionMarker(tabSelected);
            "
        >
            <div
                class="relative inline-grid items-center justify-center w-full h-10 grid-cols-2 p-1 text-gray-500 bg-gray-100 rounded-lg select-none">
                <button x-ref='login' @click="tabButtonClicked('login');"
                    class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                    Login
                </button>
                <button x-ref='register' @click="tabButtonClicked('register');"
                    class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                    Criar conta
                </button>
                <div x-ref="tabMarker" class="absolute left-0 z-10 w-1/2 h-full duration-300 ease-out" x-cloak>
                    <div class="w-full h-full bg-white rounded-md shadow-sm"></div>
                </div>
            </div>
            <div class="relative w-full mt-2 content">
                <div x-show="tabSelected == 'login'" class="relative" x-cloak>
                    @include('auth.login')
                </div>

                <div x-show="tabSelected == 'register'" class="relative" x-cloak>
                    @include('auth.register')
                </div>

            </div>
        </div>
    </div>

</x-site.template>
