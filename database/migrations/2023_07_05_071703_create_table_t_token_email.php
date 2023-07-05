<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_t_token_email', function (Blueprint $table) {
            $table->uuid();
            $table->dateTime('tgl_expired')->nullable();
            $table->string('id_user', 100);
            $table->string('id_request', 100);
            $table->string('status_klik', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_t_token_email');
    }
};
