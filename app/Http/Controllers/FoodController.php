<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    // Menampilkan data food
    public function index()
    {
        $foods = Food::all();
        return view('foods.index', compact('foods'));
    }

    // Form untuk tambah food
    public function create()
    {
        $kategori = Kategori::all();  // Ambil kategori
        return view('foods.create', compact('kategori'));
    }

    // Menyimpan data food
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'kategori_id' => 'required|exists:kategori,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000', // Validasi gambar
        ]);

        // Menyimpan gambar ke folder 'public/foods'
        $fotoPath = $request->file('foto') 
            ? $request->file('foto')->store('foods', 'public') 
            : null;

        // Simpan data ke database
        Food::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'kategori_id' => $request->kategori_id,
            'foto' => $fotoPath,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('foods.index')->with('success', 'Food item created successfully!');
    }

    // Form untuk edit food
    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $kategori = Kategori::all();
        return view('foods.edit', compact('food', 'kategori'));
    }

    // Menyimpan perubahan data food
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'kategori_id' => 'required|exists:kategori,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000', // Validasi gambar
        ]);

        // Cari food berdasarkan ID
        $food = Food::findOrFail($id);

        // Update gambar jika ada
        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            if ($food->foto && Storage::exists('public/foods/' . $food->foto)) {
                Storage::delete('public/foods/' . $food->foto); // Hapus gambar lama
            }

            // Simpan gambar baru menggunakan Storage facade
            $fotoName = $request->file('foto')->store('foods', 'public'); // Menyimpan gambar baru
        } else {
            $fotoName = $food->foto; // Jika tidak ada gambar baru, gunakan gambar lama
        }

        // Update data food
        $food->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'kategori_id' => $request->kategori_id,
            'foto' => $fotoName, // Update path foto
        ]);

        return redirect()->route('foods.index')->with('success', 'Food item updated successfully!');
    }

    // Menghapus data food
    public function destroy($id)
    {
        // Cari food berdasarkan ID
        $food = Food::findOrFail($id);

        // Hapus gambar jika ada
        if ($food->foto && Storage::exists('public/foods/' . $food->foto)) {
            Storage::delete('public/foods/' . $food->foto); // Hapus gambar
        }

        // Hapus data food
        $food->delete();

        return redirect()->route('foods.index')->with('success', 'Food item deleted successfully!');
    }
}
