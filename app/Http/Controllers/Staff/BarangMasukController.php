<?php 
namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuks = BarangMasuk::with('barang', 'supplier')->get();
        return view('staff.barangMasuk.index', compact('barangMasuks'));
    }

    public function create()
    {
        $barangs = Barang::all(); // Ambil data barang untuk dropdown
        $suppliers = Supplier::all();
        return view('staff.barangMasuk.create', compact('barangs', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'supplier_id' => 'required', // Validasi supplier_id
            'jumlah_masuk' => 'required|integer',
            'tanggal_masuk' => 'required|date',
        ]);

        BarangMasuk::create($request->all());
        return redirect()->route('staff.barangMasuk.index');
    }

    public function edit($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        return view('staff.barangMasuk.edit', compact('barangMasuk', 'barangs', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required',
            'supplier_id' => 'required', // Validasi supplier_id
            'jumlah_masuk' => 'required|integer',
            'tanggal_masuk' => 'required|date',
        ]);

        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->update($request->all());
        return redirect()->route('staff.barangMasuk.index');
    }

    public function destroy($id)
    {
        BarangMasuk::destroy($id);
        return redirect()->route('staff.barangMasuk.index');
    }
}
