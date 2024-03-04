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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pos_id');
            $table->unsignedBigInteger('waktu_id');
            $table->smallInteger('curah_hujan');
            $table->smallInteger('tinggi_muka_air');
            $table->smallInteger('klimatologi');
            $table->smallInteger('kualitas_air');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pos_id')->references('id')->on('pos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('waktu_id')->references('id')->on('konfigurasi_waktu')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
