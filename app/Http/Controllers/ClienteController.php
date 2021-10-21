<?php

namespace App\Http\Controllers;

use App\Models\Apunte;
use App\Models\Carrera;
use App\Models\Facultad;
use App\Models\Materia;
use App\Models\Tema;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request){

        $facultades=Facultad::all();
        $carreras=null;
        $materias=null;
        $temas=null;
        
        if (!is_null($request->facultad)){
            $carreras=Carrera::join('facultad','carrera.id_facultad','facultad.id')
                ->where('facultad.id',$request->facultad)
                ->select('carrera.*')
                ->get();
        }

        if (!is_null($request->carrera)){
            $materias=Materia::join('carrera','materia.id_carrera','carrera.id')
                ->where('carrera.id',$request->carrera)
                ->select('materia.*')
                ->get();
        }

        if (!is_null($request->materia)){
            $temas=Tema::join('materia','tema.id_materia','materia.id')
                ->where('materia.id',$request->materia)
                ->select('tema.*')
                ->get();
        }

        return view('index')->with('facultades',$facultades)->with('carreras',$carreras)->with('materias',$materias)
        ->with('temas',$temas);
    }

    public function apuntes(Tema $tema){
        $apuntes=Apunte::join('tema','apunte.id_tema','tema.id')
        ->where('tema.id',$tema->id)
        ->select('apunte.*')
        ->get();

        return view('apuntes',compact('apuntes','tema'));
    }
}
