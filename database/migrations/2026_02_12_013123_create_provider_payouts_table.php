<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provider_payouts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('provider_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('assistance_request_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->decimal('monto', 10, 2);

            $table->enum('estado', [
                'pendiente',
                'pagado'
            ])->default('pendiente');

            $table->string('payout_reference', 150)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provider_payouts');
    }
};
