<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <h1 class="mb-10 text-2xl font-bold text-center">Mis Notificaciones</h1>

                    @forelse ($notificaciones as $notificacion)
                        <div class="p-4 border-b border-gray-300 lg:justify-between lg:flex lg:items-center">
                            <div class="p-5">
                                <p> Tienes un nuevo candidato en : <span class="font-bold">
                                        {{ $notificacion->data['nombre_vacamte'] }} </span> </p>

                                <p> <span class="font-bold">
                                        {{ $notificacion->created_at->diffForHumans() }} </span> </p>
                            </div>
                            <div>
                                <a href="{{route('candidatos.index',$notificacion->data['id_vacamte'] )}}" class="p-3 text-sm font-bold uppercase bg-indigo-500 rounded-lg"> Ver Candidatos</a>
                            </div>

                        </div>

                    @empty
                        <div class="p-4 bg-white rounded-lg shadow-md">
                            <p class="text-center text-gray-600">No tienes notificaciones.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
</x-app-layout>
