<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WaktuPelajaran;
use Illuminate\Http\Request;

class WaktuPelajaranController extends Controller
{
    public function index(Request $request)
    {
        $waktu_pelajaran = WaktuPelajaran::latest()->search($request->search)->paginate(10);
        return view('admin.pages.waktu_pelajaran.index', compact('waktu_pelajaran'));
    }

    public function create()
    {
        return view('admin.pages.waktu_pelajaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'jam_masuk' => 'required',
                'jam_keluar' => 'required',
                'kode_hari' => 'required',
                'nama_hari' => 'required',

            ],
            [
                'nama.required' => 'wajib di-isi',
                'jam_masuk.required' => 'wajib di-isi',
                'jam_keluar.required' => 'wajib di-isi',
                'kode_hari.required' => 'wajib di-isi',
                'nama_hari.required' => 'wajib di-isi',

            ]
        );

        WaktuPelajaran::create($validated); // insert data ke database

        return redirect()->route('admin.waktu_pelajaran.index')->with('success', 'Waktu Pelajaran berhasil ditambahakan');
    }

    public function edit($id)
    {
        $waktu_pelajaran = WaktuPelajaran::find($id);
        return view('admin.pages.waktu_pelajaran.edit', compact('waktu_pelajaran'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'jam_masuk' => 'required',
                'jam_keluar' => 'required',
                'kode_hari' => 'required',
                'nama_hari' => 'required',

            ],
            [
                'nama' => 'wajib di-isi',
                'jam_masuk' => 'wajib di-isi',
                'jam_keluar' => 'wajib di-isi',
                'kode_hari' => 'wajib di-isi',
                'nama_hari' => 'wajib di-isi',

            ]
        );

        WaktuPelajaran::find($id)->update($validated); // update data ke database

        return redirect()->route('admin.waktu_pelajaran.index')->with('success', 'Waktu Pelajaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $waktu_pelajaran = WaktuPelajaran::find($id);
        $waktu_pelajaran->delete();
        return redirect()->route('admin.waktu_pelajaran.index')->with('success', 'Waktu Pelajaran berhasil dihapus');
    }
}
