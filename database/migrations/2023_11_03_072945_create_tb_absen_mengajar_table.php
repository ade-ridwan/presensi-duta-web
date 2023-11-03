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
        Schema::create('tb_absen_mengajar', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pegawai')->references('kode_pegawai')->on('tb_pegawai')->onDelete('restrict');
            $table->foreignId('id_jadwal_pelajaran')->references('id')->on('tb_jadwal_pelajaran')->onDelete('restrict');
            $table->foreignId('id_ruang')->references('id')->on('tb_ruang')->onDelete('restrict');
            $table->foreignId('id_guru_piket')->references('id')->on('tb_guru_piket')->onDelete('restrict');
            $table->date('tgl');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->integer('tahun_ajaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_absen_mengajar');
    }
};
