<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assistance_request_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->tinyInteger('score'); // 1 a 5
            $table->text('comentario')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
