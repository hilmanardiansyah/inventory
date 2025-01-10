<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $totalOrders = $user->orders()->count();
        $ordersInProgress = $user->orders()->where('status', 'in-progress')->count();
        $completedOrders = $user->orders()->where('status', 'completed')->count();
        $latestOrders = $user->orders()->latest()->limit(5)->get();

        return view('customer.dashboard', compact('totalOrders', 'ordersInProgress', 'completedOrders', 'latestOrders'));
    }
}
