<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('area_polygons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_area_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('nombre', 100)->nullable();
            $table->longText('polygon_text')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('area_polygons');
    }
};
