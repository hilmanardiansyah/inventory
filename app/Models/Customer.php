<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);  // Relasi ke User
    }

    public function orders()
    {
        return $this->hasMany(Order::class);  // Relasi ke Order
    }
}
