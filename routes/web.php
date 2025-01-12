<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|-------------------------------------------------------s-------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard'); // Arahkan ke dashboard jika sudah login
    } else {
        return redirect()->route('login'); // Arahkan ke login jika belum login
    }
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->middleware('guest');

Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('suppliers', App\Http\Controllers\Admin\SupplierController::class);
    Route::resource('customers', App\Http\Controllers\Admin\CustomerController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::get('orders/reports', [App\Http\Controllers\Admin\OrderReportController::class, 'index'])->name('orders.reports');
    Route::get('orders/export', [App\Http\Controllers\Admin\OrderReportController::class, 'export'])->name('orders.export');
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    Route::resource('settings', App\Http\Controllers\Admin\SettingController::class);
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('barang', App\Http\Controllers\Admin\BarangController::class);
    Route::resource('barangMasuk', App\Http\Controllers\Admin\BarangMasukController::class);
    Route::resource('barangKeluar', App\Http\Controllers\Admin\BarangKeluarController::class);
});


// Staff routes
Route::prefix('staff')->name('staff.')->middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Staff\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('barang', App\Http\Controllers\Staff\BarangController::class);
    Route::resource('barangMasuk', App\Http\Controllers\Staff\BarangMasukController::class);
    Route::resource('barangKeluar', App\Http\Controllers\Staff\BarangKeluarController::class);
});
//Customer routes
// Customer routes
Route::prefix('customer')->name('customer.')->middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Customer\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('orders', App\Http\Controllers\Customer\OrderController::class);
    Route::get('/profile', [App\Http\Controllers\Customer\ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [App\Http\Controllers\Customer\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\Customer\ProfileController::class, 'update'])->name('profile.update');
});

