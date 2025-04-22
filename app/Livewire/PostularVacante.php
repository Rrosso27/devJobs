<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;

    public $vacante;

    protected $rules = ["cv" => "required|mimes:pdf"];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        // Almacenar el CV
        $cvPath = $this->cv->store('cvs', 'public');
        $data['cv'] = $cvPath;


        //Crear la vacante2
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv'],
        ]);

        // Enviar notificación al reclutador
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        session()->flash('message', 'Te has postulado con éxito.');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
