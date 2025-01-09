<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'jumlah_masuk', 'tanggal_masuk', 'keterangan', 'supplier_id'];

    // Relasi dengan Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class); // Relasi ke model Supplier
    }

}
