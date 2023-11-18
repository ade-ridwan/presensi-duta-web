<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuruMapel;
use App\Models\Mapel;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class GuruMapelController extends Controller
{
    public function index(Request $request)
    {
        $guru_mapel = GuruMapel::latest()->search($request->search)->paginate(10);
        return view('admin.pages.guru_mapel.index', compact('guru_mapel'));
    }

    public function create()
    {
        // karena ada relasi, ke pegawai maka kita perlu mengirimkan data pegawai,
        // data pegawai ini akan dalam bentuk select option / pilihan
        $pegawai = Pegawai::get();
        $mapel = Mapel::get();
        return view('admin.pages.guru_mapel.create', compact('pegawai', 'mapel'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'kode_pegawai' => 'required',
                'id_mapel' => 'required',
                'tahun_ajaran' => 'required'
            ],
            [
                'kode_pegawai.required' => 'Nama Pegawai wajib diisi',
                'id_mapel.required' => 'Mata Pelajaran wajib diisi',
                'tahun_ajaran.required' => 'Tahun Ajaran wajib diisi',
            ]
        );

        // ambil data dari tabel pegawai dengan kode_pegawai
        $pegawai = Pegawai::find($request->kode_pegawai);

        // ini itu kita ambil id_user dari tbl_pegawai
        $validated['id_user'] = $pegawai->id_user;

        GuruMapel::create($validated);

        return redirect()->route('admin.guru_mapel.index')->with('success', 'Data Guru Mapel berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru_mapel = GuruMapel::find($id);
        $pegawai = Pegawai::get();
        $mapel = Mapel::get();
        return view('admin.pages.guru_mapel.edit', compact('guru_mapel', 'pegawai', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'kode_pegawai' => 'required',
                'id_mapel' => 'required',
                'tahun_ajaran' => 'required'
            ]
        );

        $guru_mapel = GuruMapel::find($id);

        // ambil data dari tabel pegawai dengan kode_pegawai
        $pegawai = Pegawai::find($request->kode_pegawai);
        // ini itu kita ambil id_user dari tbl_pegawai
        $validated['id_user'] = $pegawai->id_user;

        $guru_mapel->update($validated); // update data ke database

        return redirect()->route('admin.guru_mapel.index')->with('success', 'Data Guru Mapel berhasil diperbarui');
    }

    public function destroy($id)
    {
        // mengambil data guru_mapel, harus mengahapus terlebih dahulu data child
        $guru_mapel = GuruMapel::find($id);
        $guru_mapel->delete();

        // setelah bersih, bisa mengapus data parentnya

        return redirect()->route('admin.guru_mapel.index')->with('success', 'Data Guru Mapel berhasil dihapus');
    }
}
