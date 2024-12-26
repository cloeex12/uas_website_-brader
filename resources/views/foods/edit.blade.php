@extends('layouts.master')
@section('title', 'Edit Makanan')

@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-md mx-auto bg-white p-6 shadow-md rounded-lg">
        <h4 class="text-xl font-bold mb-4">Edit Makanan</h4>
        <form action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PATCH')
            <div>
                <label for="foto">Upload Gambar</label>
                <input type="file" name="foto" id="foto" class="block w-full mt-2">
                @if($food->image)
                    <img src="{{ asset('storage/foods' . $food->foto) }}" alt="Food Foto" class="mt-2 w-32">
                else
                    <p class="text-sm text-gray-500">Gambar belum Tersedia.</p>
                @endif
            </div>
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Nama Makanan</label>
                <input type="text" name="name" id="name" value="{{ $food->name }}" class="w-full border rounded-lg px-4 py-2">
            </div>
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea name="description" id="description" class="w-full border rounded-lg px-4 py-2">{{ $food->description }}</textarea>
            </div>
            <div>
                <label for="price" class="block text-gray-700 font-medium mb-2">Harga</label>
                <input type="number" name="price" id="price" value="{{ $food->price }}" class="w-full border rounded-lg px-4 py-2">
            </div>
            <div>
                <label for="kategori_id" class="block text-gray-700 font-medium mb-2">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="w-full border rounded-lg px-4 py-2">
                    @foreach ($kategori as $kategori)
                        <option value="{{ $kategori->id }}" {{ $food->kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Ubah</button>
        </form>
    </div>
</div>
@endsection
