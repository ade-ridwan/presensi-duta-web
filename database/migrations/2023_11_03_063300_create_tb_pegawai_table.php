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
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->string('kode_pegawai',100);
            $table->integer('nik');
            $table->integer('nuptk');
            $table->string('nama',250);
            $table->string('jk',100);
            $table->string('jenis_ptk',200);
            $table->string('status_pegawai',200);
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pegawai');
    }
};
