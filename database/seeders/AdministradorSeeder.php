<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrador::create([
            'email'=>'admin@example.com',
            'name'=>'administrador',
            'password'=>Hash::make('123123123')
        ]);
    }
}
