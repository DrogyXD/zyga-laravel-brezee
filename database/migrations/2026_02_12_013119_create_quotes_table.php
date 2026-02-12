<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assistance_request_id')
                  ->unique()
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('moneda', 10)->default('MXN');

            $table->decimal('subtotal', 10, 2)->nullable();
            $table->decimal('comision_plataforma', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();

            $table->foreignId('pricing_rule_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
