<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{

    public function __construct()
    {
        
    }

    public function loginView(){
        return view('admin.login');
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => ['required', 'max:30','exists:administrador,email'],
            'password' => ['required'],
        ]);

        $administrador=Administrador::where('email',$request->email)->first();

        // if (is_null($administrador)){
        //     return back()->withErrors(['error'=>'El usuario no existe']);    
        // }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.menu');
        }
        return back()->withErrors(['error'=>'La contraseña es incorrecta']);
    }
}
