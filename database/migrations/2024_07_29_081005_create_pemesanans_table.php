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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_jenis_bayar');
            $table->foreign('id_jenis_bayar')->references('id')->on('jenis_pembayarans')->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_resi', 30)->unique()->nullable(false);
            $table->dateTime('tgl_pesan');
            $table->enum('status_pesan', ['Menunggu dikonfirmasi', 'Diproses', 'Menunggu kurir', 'Selesai']);
            $table->enum('status_sewa', [0, 1]);
            $table->bigInteger('Total_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
