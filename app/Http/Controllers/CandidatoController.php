<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacante;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Vacante $vacante) {
        // Obtener los candidatos de la vacante
        $candidatos = Candidato::where('vacante_id', $vacante->id)->get();

        // Retornar la vista con los candidatos
        return view('candidatos.index', [
            'vacante' => $vacante,
            'candidatos' => $candidatos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
