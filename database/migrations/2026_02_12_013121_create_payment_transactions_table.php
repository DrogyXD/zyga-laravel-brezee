<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payment_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->enum('tipo', [
                'authorization',
                'capture',
                'charge',
                'refund'
            ]);

            $table->enum('estado', [
                'pending',
                'succeeded',
                'failed'
            ]);

            $table->string('gateway_reference', 150)->nullable();
            $table->json('raw_response')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};
