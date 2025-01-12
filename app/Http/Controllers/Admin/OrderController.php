<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;  // Jika diperlukan
use App\Models\Transaction;  // Jika diperlukan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Product;

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
        $products = Product::all();
        return view('admin.orders.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|string',
            'total_amount' => 'required|numeric',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|numeric|min:1|max:10000', // Atur batas yang wajar
            'items.*.price' => 'required|numeric|min:1|max:1000000', // Atur harga maksimum
        ]);


        // Membuat order baru
        $order = Order::create([
            'customer_id' => $validated['customer_id'],
            'status' => $validated['status'],
            'total_amount' => $validated['total_amount'],
        ]);

        // Menambahkan order details berdasarkan data yang dikirimkan
        foreach ($validated['items'] as $item) {
            $order->orderDetails()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['quantity'] * $item['price'],
            ]);
        }

        // Redirect ke halaman index setelah sukses
        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully!');
    }

    public function edit(Order $order)
    {
        // Mengambil semua customer untuk pilihan di form edit
        $customers = Customer::all();
        $products = Product::all();

        return view('admin.orders.edit', compact('order', 'customers', 'products'));
    }

    public function update(Request $request, Order $order)
{
    // Validasi input form
    $validated = $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'status' => 'required|string',
        'total_amount' => 'required|numeric',
        'items' => 'required|array',
        'items.*.product_id' => 'required|exists:products,id',
        'items.*.quantity' => 'required|numeric|min:1|max:10000', // Atur batas yang wajar
        'items.*.price' => 'required|numeric|min:1|max:1000000', // Atur harga maksimum
    ]);


    // Update order yang sudah ada
    $order->update([
        'customer_id' => $validated['customer_id'],
        'status' => $validated['status'],
        'total_amount' => $validated['total_amount'],
    ]);

    // Hapus order details yang lama
    $order->orderDetails()->delete();
    foreach ($validated['items'] as $item) {
        $subtotal = $item['quantity'] * $item['price'];

        // Cek apakah subtotal melebihi batas yang wajar
        if ($subtotal > 999999999) {
            return redirect()->back()->withErrors('Subtotal is too large.');
        }

        $order->orderDetails()->create([
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
            'subtotal' => $subtotal,
        ]);
    }


    // Menambahkan order details berdasarkan data yang dikirimkan
    foreach ($validated['items'] as $item) {
        $order->orderDetails()->create([
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
            'subtotal' => $item['quantity'] * $item['price'],
        ]);
    }

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
    public function show($id)
    {
        // Ambil data order berdasarkan ID
        $order = Order::with('customer', 'orderDetails')->findOrFail($id);

        // Kirim data ke view
        return view('admin.orders.show', compact('order'));
    }


}
