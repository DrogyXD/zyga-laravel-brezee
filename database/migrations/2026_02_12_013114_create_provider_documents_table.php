<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provider_documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('provider_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('tipo', 50)->nullable();
            $table->text('file_url');

            $table->enum('estatus', ['pendiente','aprobado','rechazado'])
                  ->default('pendiente');

            $table->date('expires_at')->nullable();

            $table->foreignId('reviewed_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->dateTime('reviewed_at')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provider_documents');
    }
};
