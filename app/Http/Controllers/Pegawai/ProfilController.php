<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index(Request $request)
    {
        $profil = Pegawai::latest()->search($request->search)->paginate(10);
        return view('pegawai.pages.profil.index', compact('pegawai'));
    }
}
