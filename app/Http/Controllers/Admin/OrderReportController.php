<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderReportController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel orders, order_details, dan transactions
        $orders = Order::with(['orderDetails', 'transactions'])
                       ->select('orders.*')
                       ->get();

        // Jika Anda ingin menghitung total transaksi atau data lain yang relevan
        $totalAmount = $orders->sum(function($order) {
            return $order->transactions->sum('amount');
        });

        // Kirim data ke view
        return view('admin.reports.orders', compact('orders', 'totalAmount'));
    }
}
