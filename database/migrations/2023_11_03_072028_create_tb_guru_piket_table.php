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
        Schema::create('tb_guru_piket', function (Blueprint $table) {
            $table->id();
            $table->string('hari',100);
            $table->integer('tahun_ajaran');
            $table->string('kode_pegawai')->index()->references('kode_pegawai')->on('tb_pegawai')->onDelete('restrict');
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_guru_piket');
    }
};
