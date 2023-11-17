<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuruPiket;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class GuruPiketController extends Controller
{
    public function index(Request $request)
    {
        $guru_piket = GuruPiket::latest()->search($request->search)->paginate(10);
        return view('admin.pages.guru_piket.index', compact('guru_piket'));
    }

    public function create()
    {
        // karena ada relasi, ke pegawai maka kita perlu mengirimkan data pegawai,
        // data pegawai ini akan dalam bentuk select option / pilihan
        $pegawai = Pegawai::get();
        return view('admin.pages.guru_piket.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'kode_pegawai' => 'required',
                'kode_hari' => 'required',
                'tahun_ajaran' => 'required',
            ],
            [
                'kode_pegawai.required' => 'Nama wajib diisi',
                'kode_hari.required' => 'Hari wajib diisi',
                'tahun_ajaran.required' => 'Tahun Ajaran wajib diisi',
            ]
        );

        // ambil data dari tabel pegawai dengan kode_pegawai
        $pegawai = Pegawai::find($request->kode_pegawai);

        // ini itu kita ambil id_user dari tbl_pegawai
        $validated['id_user'] = $pegawai->id_user;

        GuruPiket::create($validated);

        return redirect()->route('admin.guru_piket.index')->with('success', 'Data Guru Piket berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru_piket = GuruPiket::find($id);
        $pegawai = Pegawai::get();
        return view('admin.pages.guru_piket.edit', compact('guru_piket', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'kode_pegawai' => 'required',
                'kode_hari' => 'required',
                'tahun_ajaran' => 'required',
            ]
        );

        $guru_piket = GuruPiket::find($id);

        // ambil data dari tabel pegawai dengan kode_pegawai
        $pegawai = Pegawai::find($request->kode_pegawai);
        // ini itu kita ambil id_user dari tbl_pegawai
        $validated['id_user'] = $pegawai->id_user;

        $guru_piket->update($validated); // update data ke database

        return redirect()->route('admin.guru_piket.index')->with('success', 'Data Guru Piket berhasil diperbarui');
    }

    public function destroy($id)
    {
        // mengambil data guru_piket, harus mengahapus terlebih dahulu data child
        $guru_piket = GuruPiket::find($id);
        $guru_piket->delete();

        // setelah bersih, bisa mengapus data parentnya

        return redirect()->route('admin.guru_piket.index')->with('success', 'Data Guru Piket berhasil dihapus');
    }
}
