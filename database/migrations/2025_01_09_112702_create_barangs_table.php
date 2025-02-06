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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama_barang');
            $table->integer('stok')->default(0);
            $table->decimal('harga', 10, 2);
            $table->string('status')->default('masuk');
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->date('expired_at')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Jika kolom kategori_id dan supplier_id merujuk ke tabel lain
            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
};
