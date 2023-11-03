<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = "tb_pegawai";
    protected $fillable = [
        'kode_pegawai',
        'nik',
        'nuptk',
        'nama',
        'jk',
        'jenis_ptk',
        'status_pegawai',
        'id_user',
    ];

}
