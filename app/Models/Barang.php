<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['nama_barang', 'kategori_id', 'stok', 'harga']; // Sesuaikan dengan kolom di tabel produk

    // Relasi dengan BarangMasuk
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'barang_id');
    }

    // Relasi dengan BarangKeluar
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'barang_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }
}
