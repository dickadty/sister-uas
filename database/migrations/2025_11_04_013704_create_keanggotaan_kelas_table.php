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
        Schema::create('keanggotaan_kelas', function (Blueprint $table) {
            $table->id();  // otomatis unsignedBigInteger
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('pengguna_id');
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('pengguna_id')->references('id')->on('pengguna')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keanggotaan_kelas');
    }
};
