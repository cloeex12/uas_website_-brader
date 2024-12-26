@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')

<div class="container mx-auto px-4">
    <div class="max-w-md mx-auto bg-white p-6 shadow-md rounded-lg">
        <h4 class="text-xl font-bold mb-4">Edit Data Barang</h4>
        <form action="{{ route('barang.update', $data->id) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="id" class="block text-gray-700 font-medium mb-2">Kode Barang <span class="text-red-500">*</span></label>
                <input type="text" name="id" id="id" value="{{ $data->id }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="merk" class="block text-gray-700 font-medium mb-2">Merk <span class="text-red-500">*</span></label>
                <input type="text" name="merk" id="merk" value="{{ $data->merk }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="ukuran" class="block text-gray-700 font-medium mb-2">Ukuran <span class="text-red-500">*</span></label>
                <input type="text" name="ukuran" id="ukuran" value="{{ $data->ukuran }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="kategori" class="block text-gray-700 font-medium mb-2">Kategori <span class="text-red-500">*</span></label>
                <select name="kategori" id="kategori" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @foreach ($kategori as $category)
                        <option value="{{ $category->id }}" {{ $data->kategori_id == $category->id ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="warna" class="block text-gray-700 font-medium mb-2">Warna <span class="text-red-500">*</span></label>
                <input type="text" name="warna" id="warna" value="{{ $data->warna }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="harga" class="block text-gray-700 font-medium mb-2">Harga <span class="text-red-500">*</span></label>
                <input type="text" name="harga" id="harga" value="{{ $data->harga }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="stok" class="block text-gray-700 font-medium mb-2">Stok <span class="text-red-500">*</span></label>
                <input type="text" name="stok" id="stok" value="{{ $data->stok }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex justify-between items-center mt-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Ubah</button>
                <a href="{{ url('tampil-barang') }}" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
