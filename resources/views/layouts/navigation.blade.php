<nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50" x-data="{ open: false }">

    <!-- Primary Navigation Menu -->
    <div class="w-full flex justify-between xs:px-4 lg:px-20">

            <div class="flex items-center">
                <!-- Logo -->
                <x-application-logo/>
            
                <!-- Navigation Links -->
                <div class="max-[780px]:hidden flex md:gap-4 lg:gap-10 ms-10">
                    
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                       <i class="fa-solid fa-house me-2"></i> 
                       Inicio
                    </x-nav-link>
                    
                    <!-- BUSCAR -->
                    <form action="{{ route('search.video')}}" method="GET" role="search" class="flex items-center  gap-2">

                        <!-- Input BUSCAR -->
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="¿Qué quieres ver?" 
                            class="px-8 py-2 border border-gray-300 
                                   rounded-full focus:ring-2 focus:ring-blue-400
                                   focus:outline-none text-sm transition duration-500
                        ">

                        <button type="submit" class="px-4 py-1 floating-button">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 01-14 0 7 7 0 0114 0z" />
                            </svg>

                        </button>
                    </form>
                    
                </div>
            </div>

            <!-- Dropdown -->
            <div class="max-[1245px]:hidden min-[1245px]:flex items-center ">
             @auth
                <!-- Botón crear vídeo-->
                <a href="{{ route('create.video') }}" class="max-[1245px]:hidden inline-block px-4 py-2 floating-button">
                    Subir Vídeo
                </a>
                <div class="max-[1245px]:hidden">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent
                                       text-sm leading-4 font-medium rounded-md text-gray-500 
                                       bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150
                        ">
                            <div>{{ Auth::user()->name}}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Mis datos
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar Sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                </div>
            </div>
            @else
                
                <!-- Usuario NO logueado -->
                <x-secondary-button href="{{ route('login') }}" > 
                         <i class="fa-solid fa-user"></i> 
                       Login
                </x-secondary-button>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" 
                       class="floating-button text-lg font-medium inline-block px-5 py-1">
                        Registrar
                    </a>
                @endif

            @endauth

    </div>
    
    <!-- Hamburger -->
    <div class="min-[1245px]:hidden absolute right-6 top-1/2 -translate-y-1/2">
        <button @click="open = !open"
            class="p-2 text-3xl text-gray-500 hover:text-blue-600 transition">
            <span x-show="!open">☰</span>
            <span x-show="open">✕</span>
        </button>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="min-[1245px]:hidden absolute top-full 
                                                           left-0 w-full bg-white shadow-md pb-6
                                                    ">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('dashboard')">
                Inicio
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="
                    ms-4 
                    font-medium 
                    text-base 
                    text-gray-700
                ">
                    {{ Auth::check() ? Auth::user()->name : '' }}
                </div>

            

            @auth
            <div class="mt-6">
                <!-- BUSCAR -->
                <form action="{{ route('search.video')}}" method="GET" role="search" class="min-[780px]:hidden flex items-center mb-2 ms-4 gap-2">

                    <!-- Input BUSCAR -->
                    <input type="text" name="search" placeholder="¿Qué quieres ver?" class="input-search">

                                                                    
                    <button type="submit" class="px-4 py-1 floating-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M21 21l-6-6m2-5a7 7 0 01-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>

                <x-responsive-nav-link :href="route('profile.edit')">
                    Mis datos
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Cerrar Sesión
                    </x-responsive-nav-link>
                </form>
            </div>
            @else



                <!-- BUSCAR -->
                <form action="{{ route('search.video')}}" method="GET" role="search" class="min-[780px]:hidden flex items-center mb-4 ms-4 gap-2">

                    <!-- Input BUSCAR -->
                    <input type="text" name="search" placeholder="¿Qué quieres ver?" class="input-search">

                                                                    
                    <button type="submit" class="px-4 py-1 floating-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M21 21l-6-6m2-5a7 7 0 01-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>

                <x-responsive-nav-link :href="route('login')">
                    Login
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('register')">
                    Registro
                </x-responsive-nav-link>
  
            @endauth
        </div>
    </div>
</nav>
