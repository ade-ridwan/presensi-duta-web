<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\AbsenMengajar;
use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function scanRuangan()
    {
        return view('pegawai.pages.scan.ruangan');
    }

    public function storeScanRuangan(Request $request)
    {
        $kode_pegawai = $request->user()->pegawai->kode_pegawai;

        $id_ruang = $request->id_ruang;
        $jadwal_pelajaran = JadwalPelajaran::where('id_ruang', $id_ruang)->firstOrFail();

        $id_jadwal_pelajaran = $jadwal_pelajaran->id;
        $id_guru_piket = null;
        $tgl = date('Y-m-d');
        $jam_masuk = date('H:i:s');
        // $jam_keluar = date('H:i:s');

        $absen = AbsenMengajar::updateOrCreate([
            'tgl' => date('Y-m-d'),
            'kode_pegawai' => $kode_pegawai,
        ], [
            'kode_pegawai' => $kode_pegawai,
            'id_jadwal_pelajaran' => $id_jadwal_pelajaran,
            'id_ruang' => $id_ruang,
            'id_guru_piket' => $id_guru_piket,
            'tgl' => $tgl,
            'jam_masuk' => $jam_masuk,
            'jam_keluar' => $jam_keluar,
            'tahun_ajaran' => date('Y'),
        ]);

        $message = 'Berhasil Absen Ruangan Masuk';

        if ($absen->jam_keluar) {
            $message = 'Berhasil Absen Ruangan Keluar';
        }

        return response()->json([
            'message' => $message,
        ], 200);
    }
}
