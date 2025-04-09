<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div class="p-2 my-3 text-sm font-bold text-green-600 uppercase bg-green-100 border border-green-600">
                    {{ session('mensaje') }}
                </div>
            @endif
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Mis vacantes') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
