<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Category;
use App\Models\Order;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek apakah email dan password sesuai
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika login sukses, redirect ke dashboard admin
            return redirect()->route('admin.dashboard');
        }

        // Jika gagal login, kembalikan dengan error
        return back()->with('error', 'Email atau password salah');
    }

    public function dashboard()
    {
        // Ambil data produk, kategori, dan pesanan
        $foods = Food::all();
        $categories = Category::all();
        $orders = Order::all();

        // Kirim data ke view dashboard admin
        return view('admin.dashboard', compact('foods', 'categories', 'orders'));
    }
}
