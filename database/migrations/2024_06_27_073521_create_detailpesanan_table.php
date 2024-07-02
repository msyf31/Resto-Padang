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
        Schema::create('detailpesanan', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('produk_id');
            // $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pesanan_id');
            $table->boolean('status');
            $table->timestamps();
            // $table->foreign('produk_id')->references('id')->on('produk');
            // $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('pesanan_id')->references('id')->on('pesanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailpesanan');
    }
};
