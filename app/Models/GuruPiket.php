<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPiket extends Model
{
    use HasFactory;

    protected $table = "tb_guru_piket";
    protected $fillable = [
        'hari',
        'tahun_ajaran',
        'kode_pegawai',
        'id_user'
    ];
}
