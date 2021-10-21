<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temas = Tema::all();
        return view('usuario.tema.index', compact('temas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Materia::all();
        return view('usuario.tema.create', compact('materias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_materia' => ['required'],
            'nombre' => ['required', 'max:120'],
            'descripcion' => ['required', 'max:250'],
        ]);

        $tema = Tema::create($validatedData);

        return redirect()->route('usuario.temas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        $materias = Materia::all();
        return view('usuario.tema.edit', compact('tema', 'materias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {

        $validatedData = $request->validate([
            'id_materia' => ['required'],
            'nombre' => ['required', 'max:120'],
            'descripcion' => ['required', 'max:250'],
        ]);

        $tema->update($validatedData);

        return redirect()->route('usuario.temas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema)
    {
        $tema->delete();
        return redirect()->route('usuario.temas');
    }
}
