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
        'tahun_ajaran',
        'kode_pegawai'
    ];

    public function pegawai()
    {
        return$this->belongsTo(Pegawai::class, 'kode_pegawai');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }


    Public function scopeSearch($query, $keyword)
    {
        $query->where('id_mapel', 'like', '%' . $keyword . '%');
    }
}
