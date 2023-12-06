<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\AbsenMengajar;
use Illuminate\Http\Request;

class AbsenMengajarController extends Controller
{
    public function index(Request $request)
    {
        // mendapatkan kode_pegawai yg sedang login
        $kode_pegawai = auth()->user()->pegawai->kode_pegawai;

        $absen_mengajar = AbsenMengajar::with(['ruang', 'guru_piket', 'pegawai', 'jadwal_pelajaran'])
            ->where('kode_pegawai', $kode_pegawai) // menambahkan kondisi kode pegawai
            ->latest()->search($request->search)
            ->paginate(10);
        return view('pegawai.pages.absen_mengajar.index', compact('absen_mengajar'));
    }
}
