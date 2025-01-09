<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function barangMasuks()
    {
        return $this->hasMany(BarangMasuk::class); // Relasi satu supplier bisa punya banyak barang masuk
    }
}
