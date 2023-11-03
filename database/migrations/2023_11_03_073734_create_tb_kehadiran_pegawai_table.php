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
        Schema::create('tb_kehadiran_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pegawai')->references('kode_pegawai')->on('tb_pegawai')->onDelete('restrict');
            $table->date('tgl_absen');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->string('keterangan',200);
            $table->integer('tahun_ajaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kehadiran_pegawai');
    }
};
