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
                'kode_pegawai' => 'required|unique:tb_pegawai,kode_pegawai',
                'nik' => 'required|unique:tb_pegawai,nik',
                'nuptk' => 'nullable',
                'nama' => 'required',
                'jk' => 'required',
                'jenis_ptk' => 'required',
                'status_pegawai' => 'required',
                'foto' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required'
            ],
            [
                'kode_pegawai.required' => 'Kode Pegawai wajib diisi',
                'nik.required' => 'NIK wajib diisi',
                'nama.required' => 'Nama wajib diisi',
                'jk.required' => 'Jenis Kelamin wajib diisi',
                'jenis_ptk.required' => 'Jenis PTK wajib diisi',
                'status_pegawai.required' => 'Status Pegawai wajib diisi',
                'foto.required' => 'Foto wajib diisi',
                'email.required' => 'Email Pegawai wajib diisi',
                'password.required' => 'Password Pegawai wajib diisi',
            ]
        );

        $newUser = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'password' => bcrypt($request->password),
            'id_role' => 2,
        ]); // insert data ke tabel users

        if ($newUser) {
            $validated['id_user'] = $newUser->id;
            Pegawai::create($validated); // insert data ke tabel tbl_pegawai
        }

        return redirect()->route('admin.pegawai.index')->with('success', 'Data Pegawai berhasil ditambahkan');
    }

    public function edit($kode_pegawai)
    {
        $pegawai = Pegawai::find($kode_pegawai);
        $user = User::find($pegawai->id_user);
        return view('admin.pages.pegawai.edit', compact('pegawai', 'user'));
    }

    public function update(Request $request, $kode_pegawai)
    {
        $validated = $request->validate(
            [
                'kode_pegawai' => 'required|unique:tb_pegawai,kode_pegawai,' . $kode_pegawai . ',kode_pegawai',
                'nik' => 'required|unique:tb_pegawai,nik,' . $kode_pegawai . ',kode_pegawai',
                'nuptk' => 'nullable',
                'nama' => 'required',
                'jk' => 'required',
                'jenis_ptk' => 'required',
                'status_pegawai' => 'required',
                'foto' => 'required',
                'email' => 'required',
            ],
        );

        $pegawai = pegawai::find($kode_pegawai);

        if ($request->file('foto')) {
            $validated['foto'] = $request->foto->storeAs('public/photo', $request->file('foto')->hashName());
        }

        $pegawai->update($validated); // update data ke database

        if ($pegawai) {
            $user_data = [
                'name' => $validated['nama'],
                'email' => $validated['email'],
            ];

            if ($request->password) {
                $user_data['password'] = bcrypt($request->password);
            }
            $user = User::find($pegawai->id_user);
            $user->update($user_data); // insert data ke tabel users
        }

        return redirect()->route('admin.pegawai.index')->with('success', 'Data Pegawai berhasil diperbarui');
    }

    public function destroy($kode_pegawai)
    {
        // mengambil data pegawai, harus mengahapus terlebih dahulu data child
        $pegawai = pegawai::find($kode_pegawai);
        $pegawai->delete();

        // setelah bersih, bisa mengapus data parentnya
        $user = User::find($pegawai->id_user);
        $user->delete();

        return redirect()->route('admin.pegawai.index')->with('success', 'Data Pegawai berhasil dihapus');
    }
}
