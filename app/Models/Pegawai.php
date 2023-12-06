<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = "tb_pegawai";
    protected $primaryKey = "kode_pegawai";
    public $incrementing = false;
    protected $fillable = [
        'kode_pegawai',
        'nik',
        'nuptk',
        'nama',
        'jk',
        'jenis_ptk',
        'status_pegawai',
        'foto',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function scopeSearch($query, $keyword)
    {
        $query->where('nik', 'like', '%' . $keyword . '%');
        $query->orWhere('nuptk', 'like', '%' . $keyword . '%');
        $query->orWhere('nama', 'like', '%' . $keyword . '%');
        $query->orWhere('status_pegawai', 'like', '%' . $keyword . '%');
        $query->orWhere('jenis_ptk', 'like', '%' . $keyword . '%');
    }
}
