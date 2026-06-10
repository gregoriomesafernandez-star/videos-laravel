<x-guest-layout >
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="flex flex-col gap-4" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Correo electrónico" />
            <x-input-line id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" class="mt-4" value="Password" />
            <x-input-line id="password" class="block w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">Recordarme</span>
            </label>
        </div>

        <x-primary-button class="mt-4">
            Iniciar Sesión
        </x-primary-button>

        <div class="flex items-center mt-2 mx-auto">
            @if (Route::has('password.request'))
                <a class="form-link" href="{{ route('password.request') }}">
                    ¿Olvidaste contraseña?
                </a>
            @endif

         
            <x-secondary-button class="ms-4" href="{{ route('home') }}" >
                ← Volver
            </x-secondary-button>
            
        </div>
    </form>
</x-guest-layout>
