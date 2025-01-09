<?php

namespace App\Http\Controllers\Staff;

use App\Models\Barang;
use App\Models\Category; // Model untuk tabel categories
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    public function index()
    {
        // Mengambil semua data barang beserta kategori (eager loading)
        $barangs = Barang::with('category')->get();
        return view('staff.barang.index', compact('barangs'));
    }

    public function create()
    {
        // Mengambil semua kategori dari tabel categories
        $categories = Category::all();
        return view('staff.barang.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:categories,id', // Sesuaikan nama tabel dan kolom ID
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        // Menyimpan data barang
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('staff.barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit(Barang $barang)
    {
        // Mengambil semua kategori dari tabel categories
        $categories = Category::all();
        return view('staff.barang.edit', compact('barang', 'categories'));
    }

    public function update(Request $request, Barang $barang)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:categories,id', // Sesuaikan nama tabel dan kolom ID
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        // Memperbarui data barang
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('staff.barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy(Barang $barang)
    {
        // Menghapus barang
        $barang->delete();

        return redirect()->route('staff.barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
