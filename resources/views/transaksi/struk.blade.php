@extends('layouts.master')
@section('title', 'Struk Transaksi')

@section('content')
<div class="container">
    <h2>Struk Transaksi</h2>
    <p><strong>ID Transaksi:</strong> {{ $transactions->id }}</p>
    <p><strong>Metode Pembayaran:</strong> {{ ucfirst($transaction->payment_method) }}</p>
    <p><strong>Total Harga:</strong> Rp{{ number_format($transaction->total_price, 0, ',', '.') }}</p>
    <h3>Daftar Barang:</h3>
    <ul>
        @foreach ($transaksi->transaksiItems as $item)
            <li>{{ $item->food->name }} - Rp{{ number_format($item->price, 0, ',', '.') }} x {{ $item->quantity }} = Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</li>
        @endforeach
    </ul>
    <a href="{{ route('transactions.create') }}" class="btn btn-secondary">Kembali ke Transaksi</a>
</div>
@endsection
