<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Seeder;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tema::create([
            'id_materia'=>1,
            'nombre'=>'Series',
            'descripcion'=>'Series numericas...'
        ]);
    }
}
