<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranPegawai extends Model
{
    use HasFactory;

    protected $table = "tb_kehadiran_pegawai";
    protected $fillable = [
        'kode_pegawai',
        'tgl_absen',
        'jam_masuk',
        'jam_keluar',
        'keterangan',
        'tahun_ajaran'
    ];

}
