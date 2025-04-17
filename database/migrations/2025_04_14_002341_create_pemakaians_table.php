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
        Schema::create('pemakaians', function (Blueprint $table) {
            $table->id();
            $table->string('no_kontrol');
            $table->integer('tahun');
            $table->integer('bulan');
            $table->integer('meter_awal');
            $table->integer('meter_akhir');
            $table->integer('jumlah_pakai');
            $table->integer('biaya_beban_pemakai');
            $table->integer('tarif_kwh');
            $table->integer('biaya_pemakaian');
            $table->integer('total_bayar');
            $table->enum('status', ['lunas', 'belum_lunas'])->default('belum_lunas');
            $table->timestamps();

            $table->foreign('no_kontrol')->references('no_kontrol')->on('pelanggans')->onDelete('cascade');

            // Agar Pelanggan 'yang sama' tidak dapat mengisi data pada tahun, bulan yang sudah ada
            $table->unique(['no_kontrol', 'tahun', 'bulan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemakaians');
    }
};
