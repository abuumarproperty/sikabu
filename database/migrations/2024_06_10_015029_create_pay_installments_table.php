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
        Schema::create('pay_installments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('costumer_id');
            $table->foreignId('payment_id');
            $table->foreignId('deposit_id');
            $table->string('tanggal_pembayaran');
            $table->string('angsuran_ke');
            $table->string('harga_deal');
            $table->string('nominal');
            $table->string('sisa_angsuran');
            $table->string('petugas');
            $table->string('keterangan')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_installments');
    }
};
