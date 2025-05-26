<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Candidatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <h1 class="mb-10 text-2xl font-bold text-center">Candidatos: {{ $vacante->titulo }}</h1>

                    <div class="p-5 md:flex md:justify-center">
                        @if($vacante->candidatos->count())
                            <ul class="w-full divide-y divide-gray-200">
                                @foreach ($vacante->candidatos as $candidato)
                                    <li class="flex items-center p-3">
                                        <div class="flex-1">
                                            <p class="text-xl font-medium text-gray-800">{{ $candidato->user->name }}</p>
                                            <p class="text-sm text-gray-600">{{ $candidato->user->email }}</p>
                                            <p class="text-sm text-gray-600">Día de postulación {{ $candidato->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div>
                                            <a href="{{ asset('storage/' . $candidato->cv) }}" target="_blank" rel="noreferrer noopener"
                                               class="inline-flex items-center px-4 py-2 text-xs font-bold text-center text-white uppercase bg-blue-800 rounded-lg">
                                                Ver CV
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="p-6 bg-white border-b border-gray-200">
                                <p class="text-sm font-bold text-gray-600">No tienes candidatos registrados</p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
