@extends('layouts.master')

@section('title', 'Daftar Menu')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-4">Daftar Menu</h2>
    
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('foods.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">+ New Data</a>

    <div class="overflow-x-auto mt-6">
    <table class="table-auto border-collapse w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-blue-500 text-white">
                <th class="border px-4 py-2">No.</th>
                <th class="border px-4 py-2">Gambar</th>
                <th class="border px-4 py-2">Nama Makanan</th>
                <th class="border px-4 py-2">Deskripsi</th>
                <th class="border px-4 py-2">Harga</th>
                <th class="border px-4 py-2">Kategori</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foods as $food)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">
                        @if ($food->foto)
                            <img src="{{ asset('storage/' . $food->foto) }}" alt="Food Image" width="100" height="100">
                        @else
                            <p>No image available</p>
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $food->name }}</td>
                    <td class="border px-4 py-2">{{ $food->description }}</td>
                    <td class="border px-4 py-2">Rp {{ number_format($food->price, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ $food->kategori->name ?? 'No category' }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('foods.edit', $food->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('foods.destroy', $food->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
