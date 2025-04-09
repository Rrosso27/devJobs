<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Models\Salario;
use App\Models\Categoria;
use Livewire\WithFileUploads;
class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string|min:5',
        'salario' => 'required|exists:salarios,id',
        'categoria' => 'required|exists:categorias,id',
        'empresa' => 'required|min:5',
        'ultimo_dia' => 'required|date',
        'descripcion' => 'required|min:10',
        'imagen' => 'image|image|max:1024', // 1MB Max
    ];

    public function crearVacante()
    {
        $datos = $this->validate();


        // alamacenar la imagen
        if ($this->imagen) {
            $imagen = $this->imagen->store('vacantes', 'public');
        }
        $datos['imagen'] = $nombre_imagen = str_replace('vacantes/', '', $imagen);


        // almacenar en la base de datos
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('mensaje', 'Vacante creada con éxito.');
        return redirect()->route('dashboard');

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
