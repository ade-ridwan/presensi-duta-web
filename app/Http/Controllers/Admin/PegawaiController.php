<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
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
        $user = User::get();
        return view('admin.pages.pegawai.create', compact('user'));
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
                'kode_pegawai.required' => 'Kode Pegawai wajib diisi',
                'nik.required' => 'NIK wajib diisi',
                'nuptk.required' => 'NUPTK wajib diisi',
                'nama.required' => 'Nama wajib diisi',
                'jk.required' => 'Jenis Kelamin wajib diisi',
                'jenis_ptk.required' => 'Jenis PTK wajib diisi',
                'status_pegawai.required' => 'Status Pegawai wajib diisi',
                'id_user.required' => 'Kode Pegawai wajib diisi'
            ]
        );

        pegawai::create($validated); // insert data ke database

        return redirect()->route('admin.pegawai.index')->with('success', 'Data Pegawai berhasil ditambahkan');
    }

    public function edit($kode_pegawai)
    {
        $pegawai = Pegawai::find($kode_pegawai);
        return view('admin.pages.pegawai.edit', compact('pegawai', 'user'));
    }

    public function update(Request $request, $kode_pegawai)
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
                'kode_pegawai.required' => 'Kode Pegawai wajib diisi',
                'nik.required' => 'NIK wajib diisi',
                'nuptk.required' => 'NUPTK wajib diisi',
                'nama.required' => 'Nama wajib diisi',
                'jk.required' => 'Jenis Kelamin wajib diisi',
                'jenis_ptk.required' => 'Jenis PTK wajib diisi',
                'status_pegawai.required' => 'Status Pegawai wajib diisi',
                'id_user.required' => 'Kode Pegawai wajib diisi'
            ]
        );

        pegawai::find($kode_pegawai)->update($validated); // update data ke database

        return redirect()->route('admin.pegawai.index')->with('success', 'Data Pegawai berhasil diperbarui');
    }

    public function destroy($kode_pegawai)
    {
        $pegawai = pegawai::find($kode_pegawai);
        $pegawai->delete();
        return redirect()->route('admin.pegawai.index')->with('success', 'Data Pegawai berhasil dihapus');
    }
}
