<nav x-data="{ open: false }" class="bg-white">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 py-0 ">

    
        <div class="flex justify-between">
            <div class="flex space-x-48">
                <!-- Logo 
                <a href="{{ route('dashboard') }}">
                    <img class="banner-logo h-32" src="{{ asset('/images/watchparty-banner-logo3.png') }}" />
                </a>-->

                <a href="{{ route('dashboard') }}">
                    <svg class="fill-primary tab home-tab p-none w-36 h-36 sm:-my-px sm:ml-10 sm:flex" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 1000 500" 
                         
                         xml:space="preserve"><path 
                          d="M541.1 164.94h33.71l49.62 113.48 43.41-93.75h5.66l43.14 93.75 49.35-113.48h33.98l-79.55 184.38h-5.66l-44.22-97.9-44.22 97.9h-5.66l-14.02-32.2 11.87-25.45h-22.65L541.1 164.94zM830.16 164.94h62.29c10.6 0 19.91 1.69 27.91 5.06 8 3.38 14.65 7.83 19.95 13.37 5.3 5.54 9.3 11.82 12 18.83 2.7 7.01 4.04 14.24 4.04 21.68 0 7.27-1.35 14.46-4.04 21.55-2.7 7.1-6.7 13.37-12 18.83-5.3 5.45-11.96 9.87-19.95 13.24-8 3.38-17.3 5.06-27.91 5.06h-29.93v64.14h-32.36V218.99l31.82-24.97h-31.82v-29.08zm32.36 29.08v59.47h29.93c6.83 0 12.54-1.48 17.12-4.45 4.58-2.97 8-6.64 10.25-11 2.25-4.37 3.37-9.13 3.37-14.28 0-5.15-1.17-9.91-3.51-14.28-2.34-4.37-5.75-8.03-10.25-11-4.5-2.97-10.16-4.46-16.99-4.46h-29.92zM231.42 68.52C131.2 68.52 49.95 149.77 49.95 250c0 32.03 8.31 62.12 22.88 88.25v86.94c0 4.41 4.43 7.45 8.55 5.86l60.34-23.27c26.46 15.08 57.08 23.7 89.71 23.7 100.23 0 181.48-81.25 181.48-181.48S331.65 68.52 231.42 68.52zm80.6 194.91-108.58 62.69c-10.34 5.97-23.26-1.49-23.26-13.43V187.31c0-11.94 12.92-19.4 23.26-13.43l108.58 62.69c10.34 5.97 10.34 20.89 0 26.86zM489.26 449.66c4.01 0 7.27-3.25 7.27-7.27V57.61c0-4.01-3.25-7.27-7.27-7.27-4.01 0-7.27 3.25-7.27 7.27V442.4c0 4.01 3.25 7.26 7.27 7.26z"/>
                    
                    </svg>
                    <!--svg class="fill-primary tab home-tab hidden p-4 w-24 h-24 sm:-my-px sm:ml-10 sm:flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" 
                        style="enable-background:new 0 0 500 500" xml:space="preserve">
                        <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="17" y1="250" x2="483" y2="250">
                            <stop offset="0" style="stop-color:#3ddeed"/><stop offset="1" style="stop-color:#3f61ff"/>
                        </linearGradient>
                            <path d="M250 47.2C121.32 47.2 17 138 17 250c0 51.61 22.16 98.71 58.64 134.51l-15.68 56.32c-1.35 4.83 3.49 9.08 8.11 7.11l59.57-25.33c35.56 19.14 77.48 30.2 122.36 30.2 128.68 0 233-90.8 233-202.8S378.68 47.2 250 47.2zm92.51 210.79-131.85 76.12c-6.15 3.55-13.83-.89-13.83-7.99V173.88c0-7.1 7.69-11.54 13.83-7.99l131.85 76.12c6.15 3.55 6.15 12.43 0 15.98z" 
                        style="fill:url(#a)"/>
                    </svg-->
                </a>

                <!-- Navigation Links -->
                <div class="tab home-tab hidden w-32 sm:-my-px sm:ml-10 sm:flex px-4">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-16">
                        <svg class="fill-primary fill-current h-8 w-8 rounded-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 463.89 438.88" version="1.0">
                            <path d="M394.811 223.1zL231.991 78.91l-162.9 144.25v206.12c0 5.33 4.3 9.6 9.62 9.6h101.81V348.5c0-5.32 4.27-9.62 9.6-9.62h83.65c5.33 0 9.6 4.3 9.6 9.62v90.38h101.84c5.32 0 9.6-4.27 9.6-9.6V223.1zm-325.72.06z"/>
                            <path d="M231.051 0 .001 204.59l24.338 27.45 207.65-183.88 207.61 183.88 24.29-27.45L232.889 0l-.9 1.04-.94-1.04zM69.091 29.45h58.57l-.51 34.69-58.06 52.45V29.45z"/>
                        </svg>
                        <p class="pt-4 px-2 text-primary text-lg"> Home </p>
                    </x-nav-link>
                </div>
                <div class="tab friends-tab hidden w-32 sm:-my-px sm:ml-10 sm:flex px-4">
                    <x-nav-link :href="route('friends')" :active="request()->routeIs('friends')" class="px-16">
                        
                    <svg class="fill-primary fill-current h-10 w-10 rounded-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path d="M192 256c61.9 0 112-50.1 112-112S253.9 32 192 32 80 82.1 80 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C51.6 288 0 339.6 0 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zM480 256c53 0 96-43 96-96s-43-96-96-96-96 43-96 96 43 96 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592c26.5 0 48-21.5 48-48 0-61.9-50.1-112-112-112z"/>
                    </svg>
                    <p class="pt-4 px-2 text-primary text-lg"> Friends </p>
                    </x-nav-link>
                </div>
                <div class="tab films-tab hidden w-32 sm:-my-px sm:ml-10 sm:flex px-4">
                    <x-nav-link :href="route('movies.index')" :active="request()->routeIs('movies.index')" class="px-16">
                        
                    <svg class="fill-primary fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 17" class="si-glyph si-glyph-clapboard-play">
                        <path d="m.979 8.954 14.916-3.523-.98-4.056L0 4.898l.979 4.056Zm11.508-3.597-1.448-2.312 2.01-.486 1.449 2.312-2.011.486Zm-3.35.81L7.688 3.855l2.009-.485 1.45 2.312-2.01.485Zm-3.352.81L4.337 4.665l2.01-.485 1.449 2.312-2.011.485Zm-3.349.81L.987 5.475l2.009-.485 1.449 2.312-2.009.485ZM1 9.037v8h15v-8H1Zm6.904 6.13v-4.25l3.232 2.169-3.232 2.081Z"
                        />
                    </svg>
                    <p class="pt-4 px-2 text-primary text-lg"> Movies </p>
                    

                    </x-nav-link>
                </div>

                

            </div>


            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-l font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                

                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
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

            <!-- Hamburger 
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>-->
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
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
</nav>

<style scoped>

.banner-logo {
    animation: revealText 1.4s forwards;
}
.tab {
    opacity: 0;
    animation: loadTab 1.5s forwards;
}
.home-tab {
    animation-delay: .125s;
}
.friends-tab {
    animation-delay: .25s;
}
.films-tab {
    animation-delay: .5s;
}
@keyframes revealText {
    from {
        opacity: 0;
        transform: translateX(-80px)
    }
    to {
        opacity: 1;
        transform: none;
    }
}
@keyframes loadTab {
    from {
        opacity: 0;
        transform: translateY(-100px)
    }
    to {
        opacity: 1;
        transform: none;
    }
}

</style>

