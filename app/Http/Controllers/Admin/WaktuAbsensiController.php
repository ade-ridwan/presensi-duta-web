<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WaktuAbsensi;
use Illuminate\Http\Request;

class WaktuAbsensiController extends Controller
{
    public function index(Request $request)
    {
        $waktu_absensi = WaktuAbsensi::latest()->search($request->search)->paginate(10);
        return view('admin.pages.waktu_absensi.index', compact('waktu_absensi'));
    }

    public function create()
    {
        return view('admin.pages.waktu_absensi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
            'status' => 'required',
            'shift' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar'=> 'required'
            ],
            [
                'status.required' => 'Status wajib diisi',
                'shift.required' => 'Shift wajib diisi',
                'jam_masuk.required' => 'Jam Masuk wajib diisi',
                'jam_keluar.required' => 'Jam Keluar wajib diisi'
            ]
        );

        WaktuAbsensi::create($validated); // insert data ke database

        return redirect()->route('admin.waktu_absensi.index')->with('success', 'Waktu Absensi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $waktu_absensi = WaktuAbsensi::find($id);
        return view('admin.pages.waktu_absensi.edit', compact('waktu_absensi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'status' => 'required',
                'shift' => 'required',
                'jam_masuk' => 'required',
                'jam_keluar'=> 'required'
            ],
            [
                'status.required' => 'Status wajib diisi',
                'shift.required' => 'Shift wajib diisi',
                'jam_masuk.required' => 'Jam Masuk wajib diisi',
                'jam_keluar.required' => 'Jam Keluar wajib diisi'
            ]
        );

        WaktuAbsensi::find($id)->update($validated); // update data ke database

        return redirect()->route('admin.waktu_absensi.index')->with('success', 'Waktu Absensi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $waktu_absensi = WaktuAbsensi::find($id);
        $waktu_absensi->delete();
        return redirect()->route('admin.waktu_absensi.index')->with('success', 'Waktu Absensi berhasil dihapus');
    }
}
