<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceArea;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::updateOrCreate(
            ['email' => 'admin@zyga.com'],
            [
                'nombre' => 'Administrador ZYGA',
                'telefono' => '0000000000',
                'password' => Hash::make('Admin12345*'),
                'rol' => 'admin',
                'estatus' => 'activo',
            ]
        );

        // ZONA BASE
        $area = ServiceArea::updateOrCreate(
            ['nombre' => 'Guadalajara'],
            [
                
                'estado' => 'Jalisco',
                'pais' => 'México',
                'activo' => true,
            ]
        );

        // SERVICIOS BASE (catálogo)
        $services = [
            ['nombre' => 'Grúa', 'descripcion' => 'Servicio de arrastre y traslado de vehículo.'],
            ['nombre' => 'Cambio de llanta', 'descripcion' => 'Asistencia para reemplazar neumático.'],
            ['nombre' => 'Paso de corriente', 'descripcion' => 'Arranque por batería descargada.'],
            ['nombre' => 'Combustible', 'descripcion' => 'Suministro de combustible de emergencia.'],
            ['nombre' => 'Cerrajería', 'descripcion' => 'Apoyo por llaves olvidadas o bloqueo.'],
            ['nombre' => 'Reabastecimiento de líquidos', 'descripcion' => 'Apoyo con anticongelante/aceite/etc.'],
        ];

        foreach ($services as $s) {
            Service::updateOrCreate(
                ['nombre' => $s['nombre']],
                [
                    'descripcion' => $s['descripcion'],
                    'activo' => true,
                ]
            );
        }
    }
}
