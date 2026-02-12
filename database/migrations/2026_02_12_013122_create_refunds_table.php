<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payment_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->decimal('monto', 10, 2);

            $table->string('motivo', 255)->nullable();

            $table->enum('estado', [
                'pending',
                'succeeded',
                'failed'
            ])->default('pending');

            $table->string('gateway_reference', 150)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
