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
        Schema::create('tb_guru_mapel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mapel')->references('id')->on('tb_mapel')->onDelete('restrict');
            $table->integer('tahun_ajaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_guru_mapel');
    }
};
