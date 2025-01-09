<?php 

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::with('barang')->get();
        return view('staff.barangKeluar.index', compact('barangKeluars'));
    }

    public function create()
    {
        $barangs = Barang::all(); // Ambil data barang untuk dropdown
        return view('staff.barangKeluar.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah_keluar' => 'required|integer',
            'tanggal_keluar' => 'required|date',
        ]);

        BarangKeluar::create($request->all());
        return redirect()->route('staff.barangKeluar.index');
    }

    public function edit($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangs = Barang::all();
        return view('staff.barangKeluar.edit', compact('barangKeluar', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah_keluar' => 'required|integer',
            'tanggal_keluar' => 'required|date',
        ]);

        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->update($request->all());
        return redirect()->route('staff.barangKeluar.index');
    }

    public function destroy($id)
    {
        BarangKeluar::destroy($id);
        return redirect()->route('staff.barangKeluar.index');
    }
}
