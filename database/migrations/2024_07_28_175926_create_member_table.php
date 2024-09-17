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
        Schema::create('member', function (Blueprint $table) {
            $table->string('nis_nik')->primary();
            $table->string('id_user')->unique();
            $table->string('nama');
            $table->string('telp');
            $table->enum('status',['Full','General'])->default('General');
            $table->enum('jk',['Laki-laki','Perempuan']);
            $table->string('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
