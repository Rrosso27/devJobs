<div class="py-10 bg-gray-100">
    <h2 class="my-5 text-2xl font-extrabold text-center text-gray-600 md:text-4xl">Buscar y Filtrar Vacantes</h2>

    <div class="mx-auto max-w-7xl">
        <form wire:submit.prevent='leerDatosFormulario'>
            <div class="flex flex-col gap-5 md:flex-row md:items-end">
                <div class="w-full mb-5">
                    <label
                        class="block mb-1 text-sm font-bold text-gray-700 uppercase"
                        for="termino">Término de Búsqueda
                    </label>
                    <input
                        id="termino"
                        type="text"
                        wire:model="termino"
                        placeholder="Buscar por Término: ej. Laravel"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    />
                </div>

                <div class="w-full mb-5">
                    <label class="block mb-1 text-sm font-bold text-gray-700 uppercase">Categoría</label>
                    <select wire:model="categoria"  class="w-full p-2 border-gray-300">
                        <option>--Seleccione--</option>
                        @foreach ($categorias as $categoria )
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full mb-5">
                    <label class="block mb-1 text-sm font-bold text-gray-700 uppercase">Salario Mensual</label>
                    <select wire:model="salario" class="w-full p-2 border-gray-300">
                        <option>-- Seleccione --</option>
                        @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">{{$salario->salario}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

                <div class="w-full mb-5 md:w-auto">
                    <input
                        type="submit"
                        class="w-full px-10 py-2 text-sm font-bold text-white uppercase transition-colors bg-indigo-500 rounded cursor-pointer hover:bg-indigo-600 md:w-auto"
                        value="Buscar"
                    />
                </div>
        </form>
    </div>
</div>
