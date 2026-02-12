<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provider_schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('provider_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->tinyInteger('day_of_week'); // 0=domingo, 6=sábado
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('activo')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provider_schedules');
    }
};
