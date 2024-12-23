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
        Schema::create('pakaians', function (Blueprint $table) {
            $table->id();
            $table->string('jenis', 100)->unique()->nullable(false);
            $table->string('model', 100)->unique()->nullable(false);
            $table->string('warna', 50)->unique()->nullable(false);
            $table->enum('ukuran', ['S', 'M', 'L', 'XL', '2XL', '3XL', '4XL', '5XL', '6XL', 'All Size'])->unique()->nullable(false);
            $table->string('bahan', 50)->unique()->nullable(false);
            $table->text('Deskripsi')->nullable(true);
            $table->string('foto1')->nullable(true);
            $table->string('foto2')->nullable(true);
            $table->string('foto3')->nullable(true);
            $table->integer('stok')->default(0);
            $table->integer('harga_sewa')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakaians_create');
    }
};
