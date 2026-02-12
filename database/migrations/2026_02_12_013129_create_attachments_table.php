<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assistance_request_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('uploaded_by')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->string('tipo', 50)->nullable();
            $table->text('file_url');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
