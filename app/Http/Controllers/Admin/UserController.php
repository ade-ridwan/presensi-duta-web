<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::latest()->search($request->search)->paginate(10);
        return view('admin.pages.user.index', compact('user'));
    }

    public function create()
    {
        $role = Role::get();
        return view('admin.pages.user.create', compact('role'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'id_role' => 'required',
            ]
        );

        $validated['password'] = bcrypt($request->password);

        User::create($validated); // insert data ke database

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahakan');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::get();
        return view('admin.pages.user.edit', compact('user', 'role'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'id_role' => 'required',
            ]
        );
        if ($request->password) {
            $validated['password'] = bcrypt($request->password);
        }

        User::find($id)->update($validated); // update data ke database

        return redirect()->route('admin.user.index')->with('success', 'user berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'user berhasil dihapus');
    }
}
