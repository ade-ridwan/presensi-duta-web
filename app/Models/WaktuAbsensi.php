<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuAbsensi extends Model
{
    use HasFactory;


    protected $table = "tb_waktu_absensi";
    protected $fillable = [
        'status',
        'shift',
        'jam_masuk',
        'jam_keluar'
    ];


}
