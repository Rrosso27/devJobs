<?php

namespace App\Livewire;

use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\Component;
use App\Models\Salario;
use App\Models\Categoria;
use Livewire\WithFileUploads;
class EditVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $user_id;
    public $publicado;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $nuevo_imagen;

    use WithFileUploads;
    protected $rules = [
        'titulo' => 'required|min:6',
        'salario' => 'required',
        'categoria' => 'required',
        'publicado' => 'required',
        'empresa' => 'required|min:6',
        'ultimo_dia' => 'required|date|after:today',
        'descripcion' => 'required|min:10',
        'nuevo_imagen' => 'nullable|image|max:1024',
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->user_id = $vacante->user_id;
        $this->publicado = $vacante->publicado;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d'); // $vacante->ultimo_dia->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;

    }

    public function editarVacante()
    {
        $dato = $this->validate();

        //si hay una nueva imagen
        if ($this->nuevo_imagen) {
            //almacenar la nueva imagen
            $imagen = $this->nuevo_imagen->store('vacantes', 'public');
            //obtenemos el nombre de la imagen
            $dato['imagen'] = str_replace('vacantes/', '', $imagen);
            //eliminar la imagen anterior
            if ($this->imagen) {
                unlink(public_path('storage/vacantes/' . $this->imagen));
            }
        }

        // Encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);
        //Asignar los valores a la vacante
        $vacante->titulo = $dato['titulo'];
        $vacante->salario_id = $dato['salario'];
        $vacante->categoria_id = $dato['categoria'];
        $vacante->publicado = $dato['publicado'];
        $vacante->empresa = $dato['empresa'];
        $vacante->ultimo_dia = $dato['ultimo_dia'];
        $vacante->descripcion = $dato['descripcion'];
        $vacante->imagen = $dato['imagen'] ?? $this->imagen;
        //Guardar la vacante
        $vacante->save();

        //redirigir a la pagina de la vacante
        session()->flash('mensaje', 'La vacante se actualizó correctamente');
        return redirect()->route('dashboard');

    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.edit-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
