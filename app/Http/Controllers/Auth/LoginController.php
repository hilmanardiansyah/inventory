<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on role
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('/admin/dashboard');
            } elseif (Auth::user()->hasRole('staff')) {
                return redirect()->intended('/staff/dashboard');
            } elseif (Auth::user()->hasRole('customer')) { // Tambahkan pengecekan untuk customer
                return redirect()->intended('/customer/dashboard');
            }
        }
        session()->flash('error', 'Email atau password salah.');
        return back()->withInput()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
