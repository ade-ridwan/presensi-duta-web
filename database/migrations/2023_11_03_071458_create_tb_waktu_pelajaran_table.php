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
        Schema::create('tb_waktu_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama',100);
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->integer('kode_hari');
            $table->string('nama_hari',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_waktu_pelajaran');
    }
};
