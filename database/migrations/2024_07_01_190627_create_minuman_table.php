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
        Schema::create('minuman', function (Blueprint $table) {
            $table->id();
            $table->string('nama_minuman', 50);
            $table->string('foto')->nullable();
            $table->string('deskripsi_minuman',);
            $table->string('harga_minuman',);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minuman');
    }
};
