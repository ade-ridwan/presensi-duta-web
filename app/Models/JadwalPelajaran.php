<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;

    protected $table = "tb_jadwal_pelajaran";
    protected $fillable = [
        'id_guru_mapel',
        'tahun_ajaran',
        'id_waktu_pelajaran',
        'id_ruang'
    ];
}
