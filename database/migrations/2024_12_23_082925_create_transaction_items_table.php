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
    Schema::create('transaksi_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('transaksi_id')->constrained();
        $table->foreignId('food_id')->constrained();  // Relasi dengan tabel foods
        $table->integer('quantity');
        $table->decimal('price', 10, 2);  // Harga per item
        $table->timestamps();

        $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade');
        $table->foreign('food_id')->references('id')->on('foods');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_items');
    }
};
