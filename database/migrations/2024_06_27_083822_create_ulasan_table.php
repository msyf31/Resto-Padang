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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanan_id');
            // $table->unsignedBigInteger('produk_id');
            $table->string('ulasan');
            $table->boolean('rating');
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('pesanan_id')->references('id')->on('pesanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
