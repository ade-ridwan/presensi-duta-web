<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\AbsenMengajar;
use App\Models\GuruPiket;
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
        $dayOfWeek = date('N');
        $tgl = date('Y-m-d');
        $jam_masuk = date('H:i:s');
        $jam_keluar = null;

        $guru_piket = GuruPiket::where('kode_pegawai', $kode_pegawai)
            ->where('kode_hari', $dayOfWeek)
            ->first();

        $jadwal_pelajaran = JadwalPelajaran::where('id_ruang', $id_ruang)
            ->whereHas('waktu_pelajaran', function ($query) use ($dayOfWeek) {
                $query->where('kode_hari', $dayOfWeek);
            })
            ->first();

        $cek_absen = AbsenMengajar::where('id_ruang', $id_ruang)
            ->whereDate('tgl', date('Y-m-d'))
            ->whereNull('jam_keluar')->first();

        if ($cek_absen && $kode_pegawai != $cek_absen->kode_pegawai) {
            return response()->json([
                'message' => 'Guru ' . $cek_absen->pegawai->nama . ' Belum Absen Keluar',
            ], 500);
        }

        if (!$jadwal_pelajaran) {
            return response()->json([
                'message' => 'Tidak Ada Jadwal Mengajar',
            ], 500);
        }

        if ($jadwal_pelajaran->waktu_pelajaran->jam_masuk > $jam_masuk) {
            return response()->json([
                'message' => 'Waktu Pelajaran Sudah Habis',
            ], 500);
        }


        $id_jadwal_pelajaran = $jadwal_pelajaran->id;
        $id_guru_piket = $guru_piket->id ?? null;

        $cek_absen2 = AbsenMengajar::where('id_ruang', $id_ruang)
            ->whereDate('tgl', date('Y-m-d'))
            ->whereNull('jam_keluar')
            ->where('kode_pegawai', $kode_pegawai)->first();

        if ($cek_absen2) {
            $jam_keluar = date('Y-m-d H:i:s');
        }

        $absen = AbsenMengajar::updateOrCreate([
            'tgl' => date('Y-m-d'),
            'kode_pegawai' => $kode_pegawai,
            'id_ruang' => $id_ruang,
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

        if ($jam_keluar) {
            $message = 'Berhasil Absen Ruangan Keluar';
        }

        return response()->json([
            'message' => $message,
        ], 200);
    }
}
