@extends('layouts.master')
@section('title', 'Tambah Produk')

@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-md mx-auto bg-white p-6 shadow-md rounded-lg">
        <h4 class="text-xl font-bold mb-4">Tambah Produk</h4>
        
        <!-- Menambahkan enctype untuk mengirimkan file -->
        <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            <!-- Tampilkan error jika ada -->
            @if ($errors->any())
                <div class="bg-red-500 text-white p-2 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div>
                <label for="foto" class="block text-gray-700 font-medium mb-2">Upload Gambar</label>
                <input type="file" name="foto" id="foto" class="block w-full mt-2">
            </div>
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Nama Makanan</label>
                <input type="text" name="name" id="name" class="w-full border rounded-lg px-4 py-2" value="{{ old('name') }}" required>
            </div>
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea name="description" id="description" class="w-full border rounded-lg px-4 py-2" required>{{ old('description') }}</textarea>
            </div>
            <div>
                <label for="price" class="block text-gray-700 font-medium mb-2">Harga</label>
                <input type="number" name="price" id="price" class="w-full border rounded-lg px-4 py-2" value="{{ old('price') }}" required>
            </div>
            <div>
                <label for="kategori_id" class="block text-gray-700 font-medium mb-2">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="w-full border rounded-lg px-4 py-2" required>
                    @foreach ($kategori as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Simpan</button>
        </form>
    </div>
</div>
@endsection
