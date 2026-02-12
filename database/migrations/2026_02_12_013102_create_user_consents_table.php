<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_consents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->enum('tipo', ['terms','privacy','marketing']);
            $table->string('version', 50);
            $table->dateTime('accepted_at');
            $table->string('ip', 45)->nullable();
            $table->text('user_agent')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_consents');
    }
};
