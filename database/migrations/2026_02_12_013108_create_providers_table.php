<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->unique()
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('nombre_comercial', 150)->nullable();
            $table->string('tipo_proveedor', 100)->nullable();

            $table->boolean('validado')->default(false);

            $table->enum('estatus', ['activo','pendiente','suspendido'])
                  ->default('pendiente');

            $table->foreignId('service_area_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
