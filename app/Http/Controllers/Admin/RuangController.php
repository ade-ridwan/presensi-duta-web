<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index(Request $request)
    {
        $ruang = Ruang::latest()->search($request->search)->paginate(10);
        return view('admin.pages.ruang.index', compact('ruang'));
    }

    public function create()
    {
        return view('admin.pages.ruang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'tahun_ajaran' => 'required',
            ],
            [
                'nama.required' => 'Nama wajib diisi'
            ]
        );

        Ruang::create($validated); // insert data ke database

        return redirect()->route('admin.ruang.index')->with('success', 'Ruang berhasil ditambahakan');
    }

    public function edit($id)
    {
        $ruang = Ruang::find($id);
        return view('admin.pages.ruang.edit', compact('ruang'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'tahun_ajaran' => 'required',
            ],
            [
                'nama.required' => 'Nama wajib diisi'
            ]
        );

        Ruang::find($id)->update($validated); // update data ke database

        return redirect()->route('admin.ruang.index')->with('success', 'Ruang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $ruang = Ruang::find($id);
        $ruang->delete();
        return redirect()->route('admin.ruang.index')->with('success', 'Ruang berhasil dihapus');
    }
}
