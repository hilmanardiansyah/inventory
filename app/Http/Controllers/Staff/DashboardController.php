<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total barang
        $total_barang = Barang::count();

        // Menghitung jumlah barang masuk
        $barang_masuk = Barang::where('status', 'masuk')->count();

        // Menghitung jumlah barang keluar
        $barang_keluar = Barang::where('status', 'keluar')->count();

        // Menghitung jumlah supplier
        $total_supplier = Supplier::count();

        // Menghitung stok minimum (misalnya jika stok barang kurang dari 10)
        $stok_minimum = Barang::where('stok', '<', 10)->count();

        // Mengirimkan data ke view dashboard staff
        return view('staff.dashboard', compact(
            'total_barang', 
            'barang_masuk', 
            'barang_keluar', 
            'total_supplier', 
            'stok_minimum'
        ));
    }
}
