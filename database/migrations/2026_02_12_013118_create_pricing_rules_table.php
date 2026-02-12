<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pricing_rules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_area_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('service_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('nombre', 100)->nullable();

            $table->decimal('base_fee', 10, 2)->nullable();
            $table->decimal('per_km_fee', 10, 2)->nullable();
            $table->decimal('night_surcharge', 10, 2)->nullable();

            $table->boolean('activo')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricing_rules');
    }
};
