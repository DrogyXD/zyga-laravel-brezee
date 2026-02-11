<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'nombre' => 'Cambio de llanta',
            'descripcion' => 'Asistencia por neumático ponchado',
            'activo' => true
        ]);

        Service::create([
            'nombre' => 'Paso de corriente',
            'descripcion' => 'Auxilio por batería descargada',
            'activo' => true
        ]);

        Service::create([
            'nombre' => 'Suministro de gasolina',
            'descripcion' => 'Entrega de combustible en sitio',
            'activo' => true
        ]);
        $this->call([
            ServiceSeeder::class,
        ]);
    }
}
