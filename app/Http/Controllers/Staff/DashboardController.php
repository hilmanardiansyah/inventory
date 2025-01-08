<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Logika dashboard untuk staf
        return view('staff.dashboard', [
            'title' => 'Staff Dashboard',
            // Tambahkan data yang ingin ditampilkan
        ]);
    }
}

