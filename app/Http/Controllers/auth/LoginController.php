<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');  // Menampilkan form login yang ada di resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        // Validasi input login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect ke halaman dashboard produk jika login berhasil
            return redirect()->route('admin.foods.index');  // Sesuaikan rute yang diinginkan
        }

        // Jika login gagal, kembali ke halaman login dengan error message
        return redirect()->route('admin.login')->withErrors(['email' => 'Login gagal, periksa kembali email dan password Anda.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');  // Redirect ke halaman utama setelah logout
    }
}
