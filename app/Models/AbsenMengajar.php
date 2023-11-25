<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenMengajar extends Model
{
    use HasFactory;

    protected $table = "tb_absen_mengajar";
    protected $fillable = [
        'kode_pegawai',
        'id_jadwal_pelajaran',
        'id_ruang',
        'id_guru_piket',
        'tgl',
        'jam_masuk',
        'jam_keluar',
        'tahun_ajaran'
    ];
}
