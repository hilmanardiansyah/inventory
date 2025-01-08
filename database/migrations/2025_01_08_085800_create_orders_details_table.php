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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');  // Relasi ke tabel orders
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Relasi ke tabel products
            $table->integer('quantity');  // Jumlah barang yang dipesan
            $table->decimal('price', 10, 2);  // Harga per unit barang
            $table->decimal('subtotal', 10, 2);  // Total harga per item (quantity * price)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_details');
    }
};
