<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('budaya', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->text('deskripsi');
        $table->string('gambar'); // bisa berupa URL
        $table->string('kategori')->nullable(); // contoh: Tari, Karnaval, dsb
        $table->string('jadwal')->nullable();   // contoh: 8–10 Agustus 2025
        $table->string('tiket')->nullable();    // teks atau format harga
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
