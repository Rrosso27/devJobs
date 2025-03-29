   <form wire:submit.prevent='crearVacante' class="space-y-5 md:w-1/2">
       <div>
           <x-input-label for="titulo" :value="__('Titulo Vaacante')" />
           <x-text-input id="titulo" class="block w-full mt-1" type="text" wire:model="titulo" :value="old(key: 'titulo')"
               aria-placeholder="Titulo Vaacante" />

           @error('titulo')
               <livewire:mostrar-alerta :message="$message" />
           @enderror
       </div>
       <div>
           <x-input-label for="salario" :value="__('Salario Mensual')" />
           <select wire:model="salario" id="salario" class="block w-full mt-1 text-gray-700">
               <option value="">Selecciona---</option>
               @foreach ($salarios as $salario)
                   <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
               @endforeach
           </select>
           @error('salario')
               <livewire:mostrar-alerta :message="$message" />
           @enderror
       </div>
       <div>
           <x-input-label for="categoria" :value="__('Categoía')" />
           <select wire:model="categoria" id="categoria" class="block w-full mt-1 text-gray-700">
               <option value="">Selecciona----</option>
               @foreach ($categorias as $categoria)
                   <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
               @endforeach
           </select>
           @error('categoria')
               <livewire:mostrar-alerta :message="$message" />
           @enderror
       </div>
       <div>
           <x-input-label for="empresa" :value="__('Empresa')" />
           <x-text-input id="empresa" class="block w-full mt-1" type="text" wire:model="empresa" :value="old(key: 'empresa')"
               aria-placeholder="Empresa:ej google, aws , etc" />
           @error('empresa')
               <livewire:mostrar-alerta :message="$message" />
           @enderror
       </div>
       <div>
           <x-input-label for="ultimo_dia" :value="__('Último Diá para postularse')" />
           <x-text-input id="ultimo_dia" class="block w-full mt-1" type="date" wire:model="ultimo_dia"
               :value="old(key: 'ultimo_dia')" />
           @error('ultimo_dia')
               <livewire:mostrar-alerta :message="$message" />
           @enderror
       </div>
       <div>
           <x-input-label for="descripcion" :value="__('Descripción Puesto')" />
           <textarea wire:model="descripcion" id="descripcion" class="block w-full mt-1 text-gray-700" rows="5"></textarea>
           @error('descripcion')
               <livewire:mostrar-alerta :message="$message" />
           @enderror
       </div>
       <div>
           <x-input-label for="imagen" :value="__('Imagen')" />
           <x-text-input id="imagen" class="block w-full mt-1" type="file" wire:model="imagen"
               :value="old(key: 'imagen')" />
           @error('imagen')
               <livewire:mostrar-alerta :message="$message" />
           @enderror
       </div>
       <x-primary-button class="justify-center w-full">
           {{ __('Crear Vacante') }}
       </x-primary-button>
   </form>
