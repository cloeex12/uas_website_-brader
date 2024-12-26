<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Barryvdh\DomPDF\Facade\Pdf;


class CartController extends Controller
{
    // Fungsi untuk menambahkan item ke keranjang
    public function addToCart(Request $request, $id)
    {
        // Validasi jumlah yang dipesan
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil data produk berdasarkan ID
        $food = Food::findOrFail($id);

        // Ambil data keranjang dari sesi atau buat array kosong jika belum ada
        $cart = session()->get('cart', []);

        // Periksa apakah item sudah ada di keranjang
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                'name' => $food->name,
                'price' => $food->price,
                'quantity' => $request->quantity,
                'foto' => $food->foto,
            ];
        }

        // Simpan keranjang kembali ke sesi
        session()->put('cart', $cart);

        // Redirect ke dashboard konsumen dengan pesan sukses
        return redirect()->route('consumer.dashboard')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Fungsi untuk melihat keranjang
    public function viewCart()
    {
        // Ambil data keranjang dari sesi
        $cart = session()->get('cart', []);

        // Tampilkan halaman keranjang
        return view('consumer.view', compact('cart'));
    }

    // Fungsi untuk menghapus item dari keranjang
    public function removeItem($id)
    {
        // Ambil data keranjang dari sesi
        $cart = session()->get('cart', []);

        // Hapus item dari keranjang
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        // Kembali ke halaman keranjang dengan pesan sukses
        return redirect()->route('cart.view')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    // Fungsi untuk checkout dan membersihkan keranjang setelahnya
    public function checkout()
    {
        // Ambil data keranjang dari sesi
        $cart = session()->get('cart', []);

        // Hitung total harga dari keranjang
        $total = collect($cart)->reduce(function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        // Kirim data ke halaman struk
        return view('consumer.struk', compact('cart', 'total'));

        // Reset session keranjang setelah proses checkout
        session()->forget('cart');
    }

    public function downloadInvoice()
    {
        // Ambil data dari sesi (keranjang belanja)
        $cart = session()->get('cart', []);
        $total = collect($cart)->reduce(function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        // Buat PDF menggunakan library dompdf
        $pdf = Pdf::loadView('consumer.invoice', compact('cart', 'total'));

        // Unduh file PDF dengan nama "struk-pembayaran.pdf"
        return $pdf->download('struk-pembayaran.pdf');
    }
}
