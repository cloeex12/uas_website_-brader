@extends('layouts.master')
@section('title', 'Laporan Penjualan Restoran')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-xl font-bold mb-4 text-center">Laporan Penjualan Makanan</h1>

        <!-- Filter -->
        <form method="GET" action="{{ route('laporan.index') }}" class="mb-4">
            <div class="flex flex-wrap gap-4">
                <div class="w-full sm:w-1/3">
                    <label for="filter_menu" class="block text-sm font-medium">Filter Menu</label>
                    <select name="menu" id="filter_menu" class="w-full border border-gray-300 rounded-md p-2">
                        <option value="">Semua Menu</option>
                        @foreach ($menuList as $menu)
                            <option value="{{ $menu }}" {{ request('menu') === $menu ? 'selected' : '' }}>{{ $menu }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full sm:w-1/3">
                    <label for="filter_bulan" class="block text-sm font-medium">Filter Bulan</label>
                    <select name="bulan" id="filter_bulan" class="w-full border border-gray-300 rounded-md p-2">
                        <option value="">Semua Bulan</option>
                        @foreach ($bulanList as $bulan)
                            <option value="{{ $bulan }}" {{ request('bulan') === $bulan ? 'selected' : '' }}>{{ $bulan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full sm:w-1/3 flex items-end">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 w-full">Terapkan</button>
                </div>
            </div>
        </form>

        <!-- Tabel Laporan -->
        <table class="table-auto w-full border-collapse border border-gray-300 mt-6">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="border border-gray-300 px-4 py-2">Nama Menu</th>
                    <th class="border border-gray-300 px-4 py-2">Bulan</th>
                    <th class="border border-gray-300 px-4 py-2">Jumlah Terjual</th>
                    <th class="border border-gray-300 px-4 py-2">Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $data)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $data->nama_menu }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $data->bulan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $data->jumlah_terjual }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($data->pendapatan, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border border-gray-300 px-4 py-2 text-center">Tidak ada data untuk ditampilkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
