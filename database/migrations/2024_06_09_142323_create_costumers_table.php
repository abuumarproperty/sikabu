<?php

use App\Models\PayInstallment;
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
        Schema::create('costumers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('land_id');
            $table->foreignId('purchase_id');
            $table->string('nik')->unique();
            $table->string('umur');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('saksi_satu');
            $table->string('saksi_dua');
            $table->string('foto_ktp')->nullable();
            $table->string('no_akad');
            $table->string('kantor_pelayanan');
            $table->string('blok');
            $table->string('kuantitas');
            $table->string('harga_jual');
            $table->string('potongan')->nullable();
            $table->string('harga_setelah_pemotongan')->nullable();
            $table->string('tenor');
            $table->string('besar_angsuran');
            $table->string('tanggal_jatuh_tempo');
            $table->string('no_hp_satu');
            $table->string('no_hp_dua')->nullable();
            $table->string('agen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costumers');
    }
};
