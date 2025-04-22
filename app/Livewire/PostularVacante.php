<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Vacante;
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


        //Crear la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv'],
        ]);

        session()->flash('message', 'Te has postulado con éxito.');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
