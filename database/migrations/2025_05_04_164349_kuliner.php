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
    Schema::create('kuliners', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('lokasi');
        $table->decimal('rating', 3, 1); // contoh: 4.8
        $table->string('gambar'); // nama file gambar
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
