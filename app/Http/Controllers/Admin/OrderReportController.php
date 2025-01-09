<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderReportController extends Controller
{
    public function index(Request $request)
    {
        // Statistik Pesanan
        $totalOrders = Order::count();
        $completedOrders = Order::where('status', 'completed')->count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $totalRevenue = Order::sum('total_amount');

        // Filter Pesanan
        $orders = Order::with('customer')->when($request->status, function ($query) use ($request) {
            $query->where('status', $request->status);
        })->when($request->start_date, function ($query) use ($request) {
            $query->whereDate('created_at', '>=', $request->start_date);
        })->when($request->end_date, function ($query) use ($request) {
            $query->whereDate('created_at', '<=', $request->end_date);
        })->get();

        return view('admin.orders.reports', compact('totalOrders', 'completedOrders', 'pendingOrders', 'totalRevenue', 'orders'));
    }

}
