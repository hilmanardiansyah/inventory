<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Menampilkan profil
    public function index()
    {
        $user = Auth::user(); // Mengambil data user yang sedang login
        return view('customer.profile.index', compact('user'));
    }

    // Mengupdate profil
    public function edit()
    {
        $user = Auth::user(); // Mengambil data user yang sedang login
        return view('customer.profile.edit', compact('user'));
    }

    // Update profil
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:15', // Validasi untuk phone
            'address' => 'nullable|string|max:255', // Validasi untuk address
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('customer.profile.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
