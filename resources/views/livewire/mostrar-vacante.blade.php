<div class="p-10">
    <div class="mb-5">

        <h3 class="my-3 text-3xl font-bold text-gray-800">
            {{ $vacante->titulo }}
        </h3>
        <div class="p-4 my-10 md:grid md:grid-cols-2 bg-gray-50">
            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Empresa: <span
                    class="font-normal normau-case">{{ $vacante->empresa }}</span></p>
            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Último día para postularse: <span
                    class="font-normal normau-case">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span></p>
            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Categoria: <span
                    class="font-normal normau-case">{{ $vacante->categoria->categoria }}</span></p>
            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Salario: <span
                    class="font-normal normau-case">{{ $vacante->salario->salario }}</span></p>
        </div>
    </div>
    <div class="gap-4 md:grid md:grid-cols-6">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="imagen {{ $vacante->imagen }}">
        </div>

        <div class="md:col-span-4">
            <h3 class="my-3 text-2xl font-bold text-gray-800">Descripción del trabajo</h3>
            <p class="my-3 text-sm font-normal text-gray-600">
                {{ $vacante->descripcion }}
            </p>
        </div>

    </div>
    @guest
        <div class="p-5 mt-5 text-center border-dashed bg-gray-50">
            <p>¿Te gustaría postularte?</p>
            <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obten una cuenta y aplica a esta y otras
                vacantes</a>
        </div>
    @endguest
    {{-- permite gestionar vacantes --}}
    {{-- @can('create', App\Models\Vacante::class)
        <p>Este es un reclutador</p>
    @else
        <p>No tienes permisos para ver esta sección.</p>
    @endcan --}}

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot

</div>
