<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('barang_id'); // Relasi ke tabel barang/products
            $table->integer('jumlah_keluar'); // Jumlah barang keluar
            $table->date('tanggal_keluar'); // Tanggal barang keluar
            $table->string('keterangan')->nullable(); // Keterangan opsional
            $table->timestamps(); // Kolom created_at dan updated_at
        
            // Foreign key untuk relasi dengan tabel barang atau products
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluars');
    }
};
