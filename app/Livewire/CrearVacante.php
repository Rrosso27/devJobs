<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Salario;
use App\Models\Categoria;
class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    protected $rules = [
        'titulo' => 'required|string|min:5',
        'salario' => 'required|exists:salarios,id',
        'categoria' => 'required|exists:categorias,id',
        'empresa' => 'required|min:5',
        'ultimo_dia' => 'required|date',
        'descripcion' => 'required|min:10',
        'imagen' => 'image|max:1024', // 1MB Max
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        // Aquí puedes guardar la vacante en la base de datos
        // Por ejemplo:
        // Vacante::create([
        //     'titulo' => $this->titulo,
        //     'salario_id' => $this->salario,
        //     'categoria_id' => $this->categoria,
        //     'empresa' => $this->empresa,
        //     'ultimo_dia' => $this->ultimo_dia,
        //     'descripcion' => $this->descripcion,
        //     'imagen' => $this->imagen->store('vacantes', 'public'),
        // ]);

        session()->flash('mensaje', 'Vacante creada con éxito.');
    }
    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
