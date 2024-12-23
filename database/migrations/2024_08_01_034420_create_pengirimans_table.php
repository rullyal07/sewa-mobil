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
        Schema::create('pengirimans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tgl_kirim')->nullable(false);
            $table->dateTime('tgl_tiba')->nullable(false);
            $table->enum('status_kirim', ['Sedang dikirim', 'Tiba di tujuan'])->nullable(false);
            $table->integer('Biaya_kirim');
            $table->string('Bukti_foto');
            $table->unsignedBigInteger('id_pesan');
            $table->foreign('id_pesan')->references('id')->on('pemesanans')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengirimans');
    }
};
