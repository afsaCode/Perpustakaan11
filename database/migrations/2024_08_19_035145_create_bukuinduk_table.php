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
        Schema::create('bukuinduk', function (Blueprint $table) {
            $table->string('id_bukuinduk')->primary();
            $table->string('kategori');
            $table->string('rak')->default('-')->nullable();
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->year('tahun_terbit');
            $table->string('isbn');
            $table->integer('jml_hal');
            $table->text('sinopsis');
            $table->integer('stok');
            $table->integer('jumlah')->default('0');
            $table->string('sampul');
            $table->string('ebook')->nullable();
            $table->integer('harga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukuinduk');
    }
};
