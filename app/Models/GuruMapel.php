<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruMapel extends Model
{
    use HasFactory;

    protected $table = "tb_guru_mapel";
    protected $fillable = [
        'id_mapel',
        'tahun_ajaran'
    ];
}
