<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\GuruPiket;
use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $dayOfWeek = date('N');

        $kode_pegawai = auth()->user()->pegawai->kode_pegawai;

        $guru_piket = GuruPiket::where('kode_pegawai', $kode_pegawai)->where('kode_hari', $dayOfWeek)->first();

        $jadwal_pelajaran = JadwalPelajaran::with(['ruang', 'waktu_pelajaran', 'guru_mapel', 'guru_mapel.pegawai', 'guru_mapel.mapel'])
            ->whereHas('guru_mapel', function ($q) use ($kode_pegawai) {
                // kolom yg ada di tabel guru_mapel
                $q->where('kode_pegawai', $kode_pegawai);
            })
            ->whereHas('waktu_pelajaran', function ($q) use ($dayOfWeek) {
                // kolom yg ada di tabel guru_mapel
                $q->where('kode_hari', $dayOfWeek);
            })
            ->search($request->search)
            ->paginate(10);

        return view('pegawai.pages.dashboard.index', compact('jadwal_pelajaran', 'guru_piket'));
    }
}
