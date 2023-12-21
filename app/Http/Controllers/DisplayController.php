<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    public function index()
    {
        $dayOfWeek = date('N');
        $time = date('H:i:s');

        $guru = Pegawai::count();

        $kehadiran = DB::table('tb_jadwal_pelajaran as a')
            ->select(['b.nama as nama_ruang', 'e.nama as nama_guru', 'f.jam_masuk', 'c.nama as jam'])
            ->join('tb_ruang as b', 'a.id_ruang', '=', 'b.id')
            ->join('tb_waktu_pelajaran as c', 'a.id_waktu_pelajaran', '=', 'c.id')
            ->join('tb_guru_mapel as d', 'a.id_guru_mapel', '=', 'd.id')
            ->join('tb_pegawai as e', 'd.kode_pegawai', '=', 'e.kode_pegawai')
            ->leftJoin('tb_absen_mengajar as f', 'd.kode_pegawai', '=', 'f.kode_pegawai')
            ->where('c.kode_hari', $dayOfWeek)
            ->whereTime('c.jam_masuk', '<=', $time)
            ->orderByDesc('f.jam_masuk')
            // ->whereTime('c.jam_keluar', '>=', $time)
            ->get();

        return view('display', compact('guru', 'kehadiran'));
    }
}
