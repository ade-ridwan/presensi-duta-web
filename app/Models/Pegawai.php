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

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function scopeSearch($query, $keyword)
    {
        $query->where('nik', 'like', '%' . $keyword . '%');
        $query->where('nuptk', 'like', '%' . $keyword . '%');
        $query->where('nama', 'like', '%' . $keyword . '%');
        $query->where('status_pegawai', 'like', '%' . $keyword . '%');
        $query->where('jenis_ptk', 'like', '%' . $keyword . '%');
    }

}
