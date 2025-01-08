<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;  // Jika diperlukan
use App\Models\Transaction;  // Jika diperlukan
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Mengambil semua order beserta relasi customer, orderDetails, dan transactions
        $orders = Order::with(['customer', 'orderDetails', 'transactions'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        // Mengambil semua customer untuk pilihan di form create
        $customers = Customer::all(); 
        return view('admin.orders.create', compact('customers'));
    }

    public function store(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|string',
            'total_amount' => 'required|numeric',
        ]);

        // Membuat order baru
        $order = Order::create($validated);

        // Redirect ke halaman index setelah sukses
        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully!');
    }

    public function edit(Order $order)
    {
        // Mengambil semua customer untuk pilihan di form edit
        $customers = Customer::all();
        return view('admin.orders.edit', compact('order', 'customers'));
    }

    public function update(Request $request, Order $order)
    {
        // Validasi input form
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|string',
            'total_amount' => 'required|numeric',
        ]);

        // Update order yang sudah ada
        $order->update($validated);

        // Redirect ke halaman index setelah sukses
        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        // Hapus relasi orderDetails dan transactions (opsional, tergantung pada aturan bisnis Anda)
        $order->orderDetails()->delete();
        $order->transactions()->delete();

        // Hapus order itu sendiri
        $order->delete();

        // Redirect ke halaman index setelah sukses
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
    }
}
