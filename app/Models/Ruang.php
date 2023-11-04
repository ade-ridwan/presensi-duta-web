<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $table = "tb_ruang";
    protected $fillable = [
        'nama',
        'tahun_ajaran',
    ];

    public function scopeSearch($query, $keyword)
    {
        $query->where('nama', 'like', '%' . $keyword . '%');
    }
}
