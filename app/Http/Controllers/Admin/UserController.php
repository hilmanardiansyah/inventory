<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan daftar semua pengguna
    public function index()
    {
        $users = User::all();  // Mengambil semua data user
        return view('admin.users.index', compact('users'));
    }

    // Menampilkan form untuk membuat user baru
    public function create()
    {
        return view('admin.users.create');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,staff,customer',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone' => $validated['phone'],
            'address' => $validated['address'],
        ]);

        // Assign role yang dipilih
        $user->assignRole($validated['role']);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }


    // Menampilkan form untuk mengedit user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Memperbarui data user
    public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8',
        'role' => 'required|in:admin,staff,customer',
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255',
    ]);

    // Update data user
    $user->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,
        'phone' => $validated['phone'],
        'address' => $validated['address'],
    ]);

    // Update role menggunakan syncRoles
    $user->syncRoles($validated['role']);

    return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
}



    // Menghapus user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
