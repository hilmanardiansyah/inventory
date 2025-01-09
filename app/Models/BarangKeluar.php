<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'jumlah_keluar', 'tanggal_keluar', 'keterangan'];

    // Relasi dengan Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
