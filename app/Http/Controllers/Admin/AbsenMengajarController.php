<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbsenMengajar;
use Illuminate\Http\Request;

class AbsenMengajarController extends Controller
{
    public function index(Request $request)
    {
        $absen_mengajar = AbsenMengajar::with(['ruang','guru_piket', 'pegawai', 'jadwal_pelajaran'])
        ->latest()->search($request->search)->paginate(10);
        return view('admin.pages.absen_mengajar.index', compact('absen_mengajar'));
    }

}
