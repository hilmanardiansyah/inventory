<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'status', 'total_amount'
    ];
    // Definisikan relasi dengan OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // Definisikan relasi dengan Transaction
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

