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

    public function pegawai()
    {
        return$this->belongsTo(Pegawai::class, 'kode_pegawai');
    }

    public function jadwal_pelajaran()
    {
        return $this->belongsTo(JadwalPelajaran::class, 'id_jadwal_pelajaran');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang');
    }
    public function guru_piket()
    {
        return $this->belongsTo(GuruPiket::class, 'id_guru_piket');
    }

    Public function scopeSearch($query, $keyword)
    {
        $query->where('kode_pegawai', 'like', '%' . $keyword . '%');
    }


}
