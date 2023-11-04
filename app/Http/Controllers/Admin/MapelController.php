<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $mapel = Mapel::latest()->search($request->search)->paginate(10);
        return view('admin.pages.mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('admin.pages.mapel.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Nama wajib diisi'
            ]
        );

        Mapel::create($validated); // insert data ke database

        return redirect()->route('admin.mapel.index')->with('success', 'mapel berhasil ditambahakan');
    }

    public function edit($id)
    {
        $mapel = Mapel::find($id);
        return view('admin.pages.mapel.edit', compact('mapel'));
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

        Mapel::find($id)->update($validated); // update data ke database

        return redirect()->route('admin.mapel.index')->with('success', 'mapel berhasil diperbarui');
    }

    public function destroy($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete();
        return redirect()->route('admin.mapel.index')->with('success', 'mapel berhasil dihapus');
    }

}
