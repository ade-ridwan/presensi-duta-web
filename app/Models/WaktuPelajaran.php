<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuPelajaran extends Model
{
    use HasFactory;

    protected $table = "tb_waktu_pelajaran";
    protected $fillable = [
        'nama',
        'jam_masuk',
        'jam_keluar',
        'kode_hari',
        'nama_hari',
    ];


}
