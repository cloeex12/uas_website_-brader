@extends('layouts.master')
@section('title', 'Daftar Pesanan')
@section('content')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold mb-4">Daftar Pesanan</h1>
    <a href="{{ route('pesanan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah Pesanan</a>
    <table class="mt-6 w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="px-4 py-2 border border-gray-300">No.</th>
                <th class="px-4 py-2 border border-gray-300">Nama Pembeli</th>
                <th class="px-4 py-2 border border-gray-300">Barang</th>
                <th class="px-4 py-2 border border-gray-300">Ukuran</th>
                <th class="px-4 py-2 border border-gray-300">Total Harga</th>
                <th class="px-4 py-2 border border-gray-300">Tanggal Pesan</th>
                <th class="px-4 py-2 border border-gray-300">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanans as $pesanan)
            <tr>
                <td class="px-4 py-2 border border-gray-300">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $pesanan->nama_pembeli }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $pesanan->barang->merk }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $pesanan->barang->ukuran }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $pesanan->tanggal_pesan->format('d-m-Y H:i') }}</td>
                <td class="px-4 py-2 border border-gray-300">
                    <a href="{{ route('pesanan.edit', $pesanan->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
