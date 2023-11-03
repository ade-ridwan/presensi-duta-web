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
        Schema::table('tb_guru_mapel', function (Blueprint $table) {
            $table->string('kode_pegawai')->references('kode_pegawai')->on('tb_pegawai')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_guru_mapel', function (Blueprint $table) {
            //
        });
    }
};
