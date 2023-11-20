<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;

class JadwalPelajaranController extends Controller
{
    public function index(Request $request)
    {
        // mendapatkan kode_pegawai yg sedang login
        $kode_pegawai = auth()->user()->pegawai->kode_pegawai;

        $jadwal_pelajaran = JadwalPelajaran::with(['ruang', 'guru_mapel', 'guru_mapel.pegawai', 'guru_mapel.mapel'])
            ->whereHas('guru_mapel', function ($q) use ($kode_pegawai) {

                // kolom yg ada di tabel guru_mapel
                $q->where('kode_pegawai', $kode_pegawai);
            })
            ->latest()->search($request->search)->paginate(10);
        return view('pegawai.pages.jadwal_pelajaran.index', compact('jadwal_pelajaran'));
    }
}
