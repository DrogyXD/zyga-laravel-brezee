<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assistance_requests', function (Blueprint $table) {
            $table->id();

            $table->string('folio', 50)->unique();

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('provider_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->foreignId('service_id')
                  ->constrained()
                  ->onDelete('restrict');

            $table->foreignId('vehicle_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->foreignId('service_area_id')
                  ->constrained()
                  ->onDelete('restrict');

            $table->decimal('latitud', 10, 7)->nullable();
            $table->decimal('longitud', 10, 7)->nullable();
            $table->string('direccion_referencia', 255)->nullable();

            $table->enum('estatus', [
                'creada',
                'buscando',
                'asignada',
                'en_camino',
                'en_proceso',
                'finalizada',
                'cancelada'
            ])->default('creada');

            $table->string('cancel_reason', 255)->nullable();

            $table->foreignId('cancelled_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assistance_requests');
    }
};
