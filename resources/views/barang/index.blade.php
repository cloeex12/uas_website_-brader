@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')
<br>
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-4">Tabel Barang</h2>
    <a href="{{ route('barang.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">+ Tambah Data</a>
    <div class="overflow-x-auto mt-6">
        <table class="table-auto border-collapse w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="border px-4 py-2">No.</th>
                    <th class="border px-4 py-2">Kode Barang</th>
                    <th class="border px-4 py-2">Merk</th>
                    <th class="border px-4 py-2">Ukuran</th>
                    <th class="border px-4 py-2">Kategori</th>
                    <th class="border px-4 py-2">Warna</th>
                    <th class="border px-4 py-2">Harga</th>
                    <th class="border px-4 py-2">Stok</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($databarang as $data)
                <tr class="text-center hover:bg-gray-100">
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $data->id }}</td>
                    <td class="border px-4 py-2">{{ $data->merk }}</td>
                    <td class="border px-4 py-2">{{ $data->ukuran }}</td>
                    <td class="border px-4 py-2">{{ $data->kategori->nama_kategori }}</td>
                    <td class="border px-4 py-2">{{ $data->warna }}</td>
                    <td class="border px-4 py-2">{{ number_format($data->harga, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ $data->stok }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('barang.delete', $data->id) }}" method="post">
                            @csrf
                            <a href="{{ route('barang.edit', $data->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</a>
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
