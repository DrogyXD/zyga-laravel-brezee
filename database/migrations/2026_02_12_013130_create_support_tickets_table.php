<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assistance_request_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('opened_by')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('assigned_to')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->string('categoria', 50)->nullable();

            $table->enum('prioridad', ['baja','media','alta'])
                  ->default('media');

            $table->enum('estatus', [
                'abierto',
                'en_proceso',
                'resuelto',
                'cerrado'
            ])->default('abierto');

            $table->text('descripcion');
            $table->text('resolution')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
