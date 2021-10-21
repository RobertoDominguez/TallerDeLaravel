<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Apunte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ApunteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apuntes = Apunte::all();
        return view('usuario.apunte.index', compact('apuntes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temas = Tema::all();
        return view('usuario.apunte.create', compact('temas'));
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
            'id_tema' => ['required'],
            'titulo' => ['required', 'max:120'],
        ]);

        if (is_null($request->texto) && is_null($request->imagen) && is_null($request->url_recurso) && is_null($request->archivo)) {
            return back()->withErrors(['error' => 'Introduce al meno uno de los campos del apunte']);
        }

        $validatedData['id_usuario'] = Auth::user()->id;

        if (!is_null($request->texto)) {
            $validatedData['texto'] = $request->texto;
        }

        if (!is_null($request->url_recurso)) {
            $validatedData['url_recurso'] = $request->url_recurso;
        }

        if ($request->hasFile('imagen')) {
            $validatedData['url_imagen'] = Storage::disk('public')->put('imagenes', $request->imagen);
        }

        if ($request->hasFile('archivo')) {
            $validatedData['url_archivo'] = Storage::disk('public')->put('archivos', $request->imagen);
        }

        $apunte = Apunte::create($validatedData);

        return redirect()->route('usuario.apuntes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apunte  $apunte
     * @return \Illuminate\Http\Response
     */
    public function show(Apunte $apunte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apunte  $apunte
     * @return \Illuminate\Http\Response
     */
    public function edit(Apunte $apunte)
    {
        $temas = Tema::all();
        return view('usuario.apunte.edit', compact('apunte', 'temas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apunte  $apunte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apunte $apunte)
    {

        $validatedData = $request->validate([
            'id_tema' => ['required'],
            'titulo' => ['required', 'max:120'],
        ]);

        if (is_null($request->texto) && is_null($request->imagen) && is_null($request->url_recurso) && is_null($request->archivo)) {
            return back()->withErrors(['error' => 'Introduce al meno uno de los campos del apunte']);
        }

        $validatedData['id_usuario'] = Auth::user()->id;

        if (!is_null($request->texto)) {
            $validatedData['texto'] = $request->texto;
        }

        if (!is_null($request->url_recurso)) {
            $validatedData['url_recurso'] = $request->url_recurso;
        }

        if ($request->hasFile('imagen')) {
            if (!is_null($apunte->imagen)) {
                Storage::disk('public')->delete($apunte->url_imagen);
            }

            $validatedData['url_imagen'] = Storage::disk('public')->put('imagenes', $request->imagen);
        }

        if ($request->hasFile('archivo')) {
            if (!is_null($apunte->url_archivo)) {
                Storage::disk('public')->delete($apunte->url_archivo);
            }
            $validatedData['url_archivo'] = Storage::disk('public')->put('archivos', $request->archivo);
        }

        $apunte->update($validatedData);

        return redirect()->route('usuario.apuntes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apunte  $apunte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apunte $apunte)
    {
        if (!is_null($apunte->imagen)) {
            Storage::disk('public')->delete($apunte->url_imagen);
        }
        if (!is_null($apunte->url_archivo)) {
            Storage::disk('public')->delete($apunte->url_archivo);
        }
        $apunte->delete();
        return redirect()->route('usuario.apuntes');
    }
}
