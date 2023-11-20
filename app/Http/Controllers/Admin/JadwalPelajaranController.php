<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuruMapel;
use App\Models\JadwalPelajaran;
use App\Models\Ruang;
use App\Models\WaktuPelajaran;
use Illuminate\Http\Request;

class JadwalPelajaranController extends Controller
{
    public function index(Request $request)
    {
        $jadwal_pelajaran = JadwalPelajaran::latest()->search($request->search)->paginate(10);
        return view('admin.pages.jadwal_pelajaran.index', compact('jadwal_pelajaran'));
    }

    public function create()
    {
        // karena ada relasi, ke pegawai maka kita perlu mengirimkan data pegawai,
        // data pegawai ini akan dalam bentuk select option / pilihan
        $guru_mapel = GuruMapel::get();
        $waktu_pelajaran = WaktuPelajaran::get();
        $ruang = Ruang::get();
        return view('admin.pages.jadwal_pelajaran.create', compact('guru_mapel', 'waktu_pelajaran', 'ruang'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'id_waktu_pelajaran' => 'required',
                'id_guru_mapel' => 'required',
                'id_ruang' => 'required',
                'tahun_ajaran' => 'required'
            ],
            [
                'id_waktu_pelajaran.required' => 'Waktu Pelajaran wajib diisi',
                'id_guru_mapel.required' => 'Nama Guru Mata Pelajaran wajib diisi',
                'id_ruang.required' => 'Ruang wajib diisi',
                'tahun_ajaran.required' => 'Tahun Ajaran wajib diisi',
            ]
        );

        // ambil data dari tabel guru mapel dengan kode_pegawai
        //$guru_mapel = GuruMapel::find($request->id);

        // ini itu kita ambil id_user dari tbl_pegawai
        //$validated['id_user'] = $pegawai->id_user;

        JadwalPelajaran::create($validated);

        return redirect()->route('admin.jadwal_pelajaran.index')->with('success', 'Data Jadwal Pelajaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal_pelajaran = JadwalPelajaran::find($id);
        $guru_mapel = GuruMapel::get();
        $waktu_pelajaran = WaktuPelajaran::get();
        $ruang = Ruang::get();
        return view('admin.pages.jadwal_pelajaran.edit', compact('jadwal_pelajaran', 'guru_mapel', 'waktu_pelajaran', 'ruang'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'id_waktu_pelajaran' => 'required',
                'id_guru_mapel' => 'required',
                'id_ruang' => 'required',
                'tahun_ajaran' => 'required'
            ]
        );

        $jadwal_pelajaran = JadwalPelajaran::find($id);

        // ambil data dari tabel pegawai dengan kode_pegawai
        //$pegawai = Pegawai::find($request->kode_pegawai);
        // ini itu kita ambil id_user dari tbl_pegawai
        //$validated['id_user'] = $pegawai->id_user;

        $jadwal_pelajaran->update($validated); // update data ke database

        return redirect()->route('admin.jadwal_pelajaran.index')->with('success', 'Data Jadwal Pelajaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        // mengambil data jadwal_pelajaran, harus mengahapus terlebih dahulu data child
        $jadwal_pelajaran = JadwalPelajaran::find($id);
        $jadwal_pelajaran->delete();

        // setelah bersih, bisa mengapus data parentnya

        return redirect()->route('admin.jadwal_pelajaran.index')->with('success', 'Data Jadwal Pelajaran berhasil dihapus');
    }

}
