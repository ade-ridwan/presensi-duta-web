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

    public function guru_mapel()
    {
        return$this->belongsTo(GuruMapel::class, 'id_guru_mapel');
    }

    public function waktu_pelajaran()
    {
        return $this->belongsTo(WaktuPelajaran::class, 'id_waktu_pelajaran');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang');
    }

    Public function scopeSearch($query, $keyword)
    {
        $query->where('id_guru_mapel', 'like', '%' . $keyword . '%');
    }


}
