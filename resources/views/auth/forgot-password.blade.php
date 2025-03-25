<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('¿Olvidaste tu contraseña? Ingresa tu correo electrónico de registro y te enviaremos un enlace para crear una nueva contraseña.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-between my-5">
            <x-link :href="route('login')">
                Iniciar Sesión
            </x-link>
            <x-link :href="route('register')">
                Crear Cuenta
            </x-link>
        </div>

        <div class="justify-center w-full">
            <x-primary-button>
                {{ __('Restablecer password ') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
