<x-guest-layout>
    <form method="POST" novalidate action="{{ route('register') }}">
        @csrf
        <div>
            <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div class="mt-4">
            <x-input-label for="email" :value="__('¿Cual es tu tipo de cuenta?')" />
                <select name="rol" id="rol" class="block mb-2 text-sm font-bold text-gray-500 uppercase">
                    <option value="">Selecciona un rol</option>
                    <option value="1">Developer /Obtemer Empleo-</option>
                    <option value="2">Recruiter - Publicar Empleos</option>

                </select>
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex justify-between my-5">
            <x-link :href="route('password.request')">
                Olvidaste tu contraseña?
            </x-link>

            <x-link :href="route('login')">
                Iniciar Sesión
            </x-link>
        </div>
        <x-primary-button class="justify-center w-full">
            {{ __('Crear Cuenta') }}
        </x-primary-button>
    </form>
</x-guest-layout>
