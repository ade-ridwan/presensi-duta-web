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
        Schema::create('tb_jadwal_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_guru_mapel')->references('id')->on('tb_guru_mapel')->onDelete('restrict');
            $table->integer('tahun_ajaran');
            $table->foreignId('id_waktu_pelajaran')->references('id')->on('tb_waktu_pelajaran')->onDelete('restrict');
            $table->foreignId('id_ruang')->references('id')->on('tb_ruang')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jadwal_pelajaran');
    }
};
