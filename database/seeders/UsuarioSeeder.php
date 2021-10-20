<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'id_carrera'=>1,
            'ci'=>'11111',
            'email'=>'usuario@example.com',
            'nombre'=>'Usuario',
            'password'=>Hash::make('123123123'),
        ]);

        Usuario::create([
            'id_carrera'=>1,
            'ci'=>'22222',
            'email'=>'usuario2@example.com',
            'nombre'=>'Usuario',
            'password'=>Hash::make('123123123'),
        ]);
    }
}
