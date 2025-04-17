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
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('no_kontrol')->unique();
            $table->string('nama');
            $table->text('alamat');
            $table->text('telepon');
            $table->string('jenis_plg');
            $table->timestamps();

            $table->foreign('jenis_plg')->references('jenis_plg')->on('tarifs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
