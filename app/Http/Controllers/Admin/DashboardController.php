<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product; // Misal untuk mengambil data barang
use App\Models\Supplier; // Misal untuk mengambil data supplier
use App\Models\Category; // Misal untuk mengambil data kategori barang
use App\Models\Transaction; // Misal untuk mengambil transaksi barang
use App\Models\TransactionDetail; // Misal untuk menghitung barang keluar dan masuk

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data untuk dashboard
        $total_barang = Product::count(); // Total barang
        $barang_masuk = TransactionDetail::where('type', 'in')->sum('quantity'); // Barang Masuk
        $barang_keluar = TransactionDetail::where('type', 'out')->sum('quantity'); // Barang Keluar
        $total_supplier = Supplier::count(); // Total Supplier
        $kategori_barang = Category::count(); // Total Kategori Barang
        $stok_minimum = Product::where('stock', '<', 10)->count(); // Stok Minimum, misalnya di bawah 10

        return view('admin.dashboard', [
            'title' => 'Admin Dashboard',
            'total_barang' => $total_barang,
            'barang_masuk' => $barang_masuk,
            'barang_keluar' => $barang_keluar,
            'total_supplier' => $total_supplier,
            'kategori_barang' => $kategori_barang,
            'stok_minimum' => $stok_minimum,
        ]);
    }
}

