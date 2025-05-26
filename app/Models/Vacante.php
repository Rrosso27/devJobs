<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $casts = [
        'ultimo_dia' => 'datetime',
    ];
    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'user_id',
        'publicado',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at', 'desc');
    }

    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
