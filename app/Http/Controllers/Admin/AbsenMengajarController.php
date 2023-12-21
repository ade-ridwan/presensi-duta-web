<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbsenMengajar;
use Illuminate\Http\Request;

class AbsenMengajarController extends Controller
{
    public function index(Request $request)
    {
        $absen_mengajar = AbsenMengajar::with(['ruang', 'guru_piket', 'pegawai', 'jadwal_pelajaran.ruang'])
            ->latest()->search($request->search)->paginate(10);
        return view('admin.pages.absen_mengajar.index', compact('absen_mengajar'));
    }

    public function destroy($id)
    {
        // mengambil data guru_mapel, harus mengahapus terlebih dahulu data child
        $absen_mengajar = AbsenMengajar::find($id);
        $absen_mengajar->delete();

        // setelah bersih, bisa mengapus data parentnya
        return redirect()->route('admin.absen_mengajar.index')->with('success', 'Absen Mengajar berhasil dihapus');
    }
}
