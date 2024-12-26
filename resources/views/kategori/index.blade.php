@extends('layouts.master')
@section('title', 'Daftar Kategori')
@section('content')
<br>
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-4">Daftar Kategori</h2>
    <a href="{{ route('kategori.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">+ New Data</a>
    <div class="overflow-x-auto mt-6">
        <table class="table-auto border-collapse w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="border px-4 py-2">No.</th>
                    <th class="border px-4 py-2">Kode Kategori</th>
                    <th class="border px-4 py-2">Nama Kategori</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $data)
                <tr class="text-center hover:bg-gray-100">
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $data->id }}</td>
                    <td class="border px-4 py-2">{{ $data->name }}</td>
                    <td class="border px-4 py-2">
                        <!-- Tombol Delete -->
                        <form action="{{ route('kategori.delete', $data->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </form>
                        
                        <!-- Tombol Edit -->
                        <a href="{{ route('kategori.edit', $data->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
