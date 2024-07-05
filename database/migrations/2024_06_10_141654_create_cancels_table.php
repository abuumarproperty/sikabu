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
        Schema::create('cancels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('costumer_id');
            $table->foreignId('land_id');
            $table->string('no_surat_pembatalan');
            $table->string('blok');
            $table->string('kantor_pelayanan');
            $table->string('tanggal_pembatalan');
            $table->string('alasan_batal');
            $table->string('jumlah_uang_yang_telah_disetor');
            $table->string('nilai_pengembalian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancels');
    }
};
