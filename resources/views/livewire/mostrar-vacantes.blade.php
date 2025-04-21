<div>
    <div>
        @if (session()->has('mensaje'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('mensaje') }}
            </div>
        @endif
        @forelse ($vacantes as $vacante)
            <div
                class="h-64 p-6 overflow-y-auto bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <div class="leading-10">
                        <a href="#" class="text-xl font-bold">
                            {{ $vacante->titulo }}
                        </a>
                        <p class="text-sm font-bold text-gray-600">{{ $vacante->empresa }}</p>
                        <p class="text-sm font-bold text-gray-500">Último día:
                            {{ $vacante->ultimo_dia->format('d/m/y') }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-stretch gap-3 mt-5 md:flex-row md:mt-0 ">
                    <a class="px-4 py-2 text-xs font-bold text-center text-white uppercase rounded-lg bg-slate-800"
                        href="#">
                        Candidatos
                    </a>
                    <a class="px-4 py-2 text-xs font-bold text-center text-white uppercase bg-blue-800 rounded-lg"
                        href="{{ route('vacantes.edit', $vacante->id) }}">
                        Editar
                    </a>
                    <button class="px-4 py-2 text-xs font-bold text-center text-white uppercase bg-red-600 rounded-lg"
                        onclick="confirmarEliminacion({{ $vacante->id }})">
                        Eliminar
                    </button>
                </div>
            </div>


        @empty
            <div class="p-6 bg-white border-b border-gray-200">
                <p class="text-sm font-bold text-gray-600">No tienes vacantes publicadas</p>
            </div>
        @endforelse
    </div>
    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmarEliminacion(vacanteId) {
                console.log(vacanteId);
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "No podrás revertir esta acción.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // 👇 Enviamos como objeto
                        Livewire.dispatch('eliminarVacante', {
                            vacanteId: vacanteId
                        });

                        Swal.fire(
                            'Eliminado',
                            'La vacante ha sido eliminada.',
                            'success'
                        );
                    }
                });
            }
        </script>
    @endpush

</div>
