<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=Usuario::all();
        return view('admin.usuario.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras=Carrera::all();
        return view('admin.usuario.create',compact('carreras'));
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
            'id_carrera' => ['required'],
            'nombre' => ['required','max:120'],
            'ci' => ['required','max:10'],
            'email' => ['required', 'max:30','unique:usuario,email'],
            'password' => ['required','min:8'],
        ]);
        
        $validatedData['password']=Hash::make($request->password);

        $usuario=Usuario::create($validatedData);

        return redirect()->route('admin.usuarios');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $carreras=Carrera::all();
        return view('admin.usuario.edit',compact('usuario','carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $validatedData = $request->validate([
            'id_carrera' => ['required'],
            'nombre' => ['required','max:120'],
            'ci' => ['required','max:10'],
            'email' => ['required', 'max:30'],
        ]);

        if (!is_null($request->password)){
            $validatedData['password']=Hash::make($request->password);
        }

        $usuario_email=Usuario::where('email',$request->email)->where('id','!=',$usuario->id)->first();
        
        if (!is_null($usuario_email)){
            return back()->withErrors(['error','Este email ya pertenece a un usuario']);
        }

        $usuario->update($validatedData);

        return redirect()->route('admin.usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin.usuarios');
    }
}
