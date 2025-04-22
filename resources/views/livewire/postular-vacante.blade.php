<div class="flex flex-col items-center justify-center p-5 mt-10 bg-gray-100">
    <h3 class="my-4 text-2xl font-bold text-center">Postúlate a esta vacante</h3>

    @if (session()->has('message'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ session('message') }}
        </div>
    @else
        <form wire:submit.prevent="postularme" class="mt-5 w-96">
            <div class="mb-4">

                <x-input-label for="cv" :value="__('Curriculum o Hoja de vida')" />
                <x-text-input id="cv" type="file" wire:model='cv' accept=".pdf" class="block w-full mt-1" />
            </div>
            @error('cv')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
            <x-primary-button class="my-5 bg-indigo-600">{{ __('Postularme') }}</x-primary-button>
        </form>
    @endif


</div>
