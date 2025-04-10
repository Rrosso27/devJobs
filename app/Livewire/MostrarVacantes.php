<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vacante;
class MostrarVacantes extends Component
{
    public function render()
    {
        return view('livewire.mostrar-vacantes', [
            'vacantes' => Vacante::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10)
        ]);
    }
}
