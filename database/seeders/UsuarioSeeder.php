<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    
    public function run(): void
    {
        User::create([
            'motivo_diligenciamiento' => 'Registro inicial',
            'tipo_documento' => 'CC',
            'numero_documento' => '123456789',
    'primer_nombre' => 'María',
    'primer_apellido' => 'Palacio',
    'nombres_apellidos_civica' => 'María Palacio Duque',
]);
    }
}