<?php

namespace Database\Seeders;

use App\Models\Facultad;
use Illuminate\Database\Seeder;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facultad::create([
            'id'=>1,
            'nombre'=>'Facultad de Ingenieria en Ciencias de la Computacion',
            'sigla'=>'FICCT'
        ]);


    }
}
