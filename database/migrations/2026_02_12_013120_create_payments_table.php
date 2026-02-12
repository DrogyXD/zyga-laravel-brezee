<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assistance_request_id')
                  ->unique()
                  ->constrained()
                  ->onDelete('cascade');

            $table->decimal('monto', 10, 2)->nullable();

            $table->enum('metodo', ['efectivo','tarjeta','digital'])
                  ->nullable();

            $table->enum('estado_pago', [
                'pendiente',
                'pagado',
                'fallido',
                'reembolsado'
            ])->default('pendiente');

            $table->string('provider_gateway', 50)->nullable();
            $table->string('gateway_reference', 150)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
