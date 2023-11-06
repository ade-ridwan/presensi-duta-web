<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $pegawai = Pegawai::latest()->search($request->search)->paginate(10);
        return view('admin.pages.pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('admin.pages.pegawai.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'kode_pegawai' => 'required',
                'nik' => 'required',
                'nuptk' => 'required',
                'nama' => 'required',
                'jk' => 'required',
                'jenis_ptk' => 'required',
                'status_pegawai' => 'required',
                'id_user' => 'required',
            ],
            [
                'nama.required' => 'Nama wajib diisi'
            ]
        );

        pegawai::create($validated); // insert data ke database

        return redirect()->route('admin.pegawai.index')->with('success', 'Data Pegawai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return view('admin.pages.pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Nama wajib diisi'
            ]
        );

        pegawai::find($id)->update($validated); // update data ke database

        return redirect()->route('admin.pegawai.index')->with('success', 'pegawai berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pegawai = pegawai::find($id);
        $pegawai->delete();
        return redirect()->route('admin.pegawai.index')->with('success', 'pegawai berhasil dihapus');
    }
}
