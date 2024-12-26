<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiItem;
use App\Models\Food;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        // Pastikan nama tabel dan relasi model sudah benar
        $transaksis = Transaksi::with('items.food')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $foods = Food::all();
        return view('transaksi.create', compact('foods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'payment_method' => 'required|in:cash,transfer',
            'items' => 'required|array',
            'items.*.food_id' => 'required|exists:foods,id',
            'items.*.quantity' => 'required|numeric|min:1',
        ]);

        // Buat transaksi baru
        $transaksi = Transaksi::create([
            'user_id' => $request->user_id,
            'payment_method' => $request->payment_method,
            'total_price' => 0, // Akan dihitung di bawah
        ]);
        

        $totalPrice = 0;

        // Simpan detail item transaksi
        foreach ($request->items as $item) {
            $food = Food::find($item['food_id']);
            $quantity = $item['quantity'];
            $subtotal = $food->price * $quantity;

            TransaksiItem::create([
                'transaksi_id' => $transaksi->id,
                'food_id' => $food->id,
                'quantity' => $quantity,
                'price' => $food->price,
                'subtotal' => $subtotal,
            ]);

            $totalPrice += $subtotal;
        }

        // Perbarui total harga transaksi
        $transaksi->update(['total_price' => $totalPrice]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi created successfully.');
    }
}
