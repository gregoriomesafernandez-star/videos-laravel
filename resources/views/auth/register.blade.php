<x-guest-layout>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Nombre" />
            <x-input-line id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" class="mt-8" value="Email" />
            <x-input-line id="email" class="block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" class="mt-8" value="Contraseña" />

            <x-input-line id="password" class="block w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" class="mt-8" value="Confirmar contraseña" />

            <x-input-line id="password_confirmation" class="block w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="mt-6 mx-auto rounded-sm bg-blue-800 hover:bg-blue-700">
                Registrarse
        </x-primary-button>


        <div class="flex items-center mt-4 justify-center">

            <a class="form-link" href="{{ route('login') }}">
                ¿Ya estás registrado?
            </a>
            <x-secondary-button href="{{ route('home') }}" class="ms-4">
                    ← Volver
            </x-secondary-button>
            
        </div>
    </form>
</x-guest-layout>
