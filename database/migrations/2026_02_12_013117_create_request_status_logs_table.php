<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('request_status_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assistance_request_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('old_status')->nullable();
            $table->string('new_status');

            $table->foreignId('changed_by')
                  ->constrained('users')
                  ->onDelete('restrict');

            $table->timestamp('changed_at');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('request_status_logs');
    }
};
