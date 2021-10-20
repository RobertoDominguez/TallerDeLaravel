<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrera::create([
            'id'=>1,
            'codigo'=>'187-4',
            'nombre'=>'Ingenieria en Sistemas',
            'id_facultad'=>1
        ]);
    }
}
