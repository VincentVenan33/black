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
        Schema::create('pendaftaranpasien', function (Blueprint $table) {
            $table->id();
            $table->integer('idpasien');
            $table->date('tanggaldaftar');
            $table->string('jadwal');
            $table->char('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaranpasien');
    }
};