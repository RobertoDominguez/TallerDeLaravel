<?php

namespace Database\Seeders;

use App\Models\Materia;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materia::create([
            'id_carrera'=>1,
            'nombre'=>'Introduccion a la informatica',
            'sigla'=>'INF110'
        ]);
    }
}
