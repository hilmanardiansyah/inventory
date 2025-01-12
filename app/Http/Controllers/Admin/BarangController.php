<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Category;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('category')->get();
        return view('admin.barang.index', compact('barangs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.barang.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:categories,id', // Sesuaikan nama tabel dan kolom ID
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);
        return redirect()->route('admin.barang.index');
    }

    public function edit(Barang $barang)
    {
        $categories = Category::all();
        return view('admin.barang.edit', compact('barang', 'categories'));
    }

    public function update(Request $request, Barang $barang)
    {
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
        return redirect()->route('admin.barang.index');
    }

    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->route('admin.barang.index');
    }
}
