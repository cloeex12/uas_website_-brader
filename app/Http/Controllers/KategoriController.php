<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Food;
use Illuminate\Http\Request;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all(); // Ambil semua data kategori
        return view('kategori.index', compact('kategori')); // Kirim data kategori ke view
    }



    /**
     * Show the form for creating a new resource.
     */
    // Menampilkan form untuk menambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan data kategori
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Simpan data kategori ke database
        Kategori::create([
            'name' => $request->get('name'),
        ]);
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil data kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data kategori berdasarkan ID
        $data = Kategori::findOrFail($id);
    
        // Mengirimkan data kategori ke view
        return view('kategori.edit', compact('data'));
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Temukan kategori berdasarkan ID dan update
        $kategori = Kategori::findOrFail($id);
        $kategori->name = $request->input('name');
        $kategori->save();
    
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }     

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);
        
        // Hapus kategori
        $kategori->delete();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }    
}
