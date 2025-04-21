<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vacante.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vacante.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        $this->authorize('update', $vacante);
        return view('vacante.edit', [
            'vacante' => $vacante
        ]);
    }
}
