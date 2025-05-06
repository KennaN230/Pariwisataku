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
    Schema::create('penginapan', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('lokasi');
        $table->text('deskripsi');
        $table->string('gambar');
        $table->decimal('harga', 10, 2);
        $table->float('rating')->default(0);
        $table->json('fasilitas')->nullable(); // array JSON
        $table->string('link_maps')->nullable();
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
