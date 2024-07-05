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
        Schema::create('land_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('costumer_id');
            $table->foreignId('land_id');
            $table->string('blok');
            $table->string('kantor_pelayanan');
            $table->string('tanggal');
            $table->string('nama_yang_menyerahkan');
            $table->string('nama_yang_menerima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_certificates');
    }
};
