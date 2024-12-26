<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Struk Pembayaran</h1>
        
        <div class="alert alert-success">
            Pesanan Anda telah berhasil diproses!
        </div>

        <h3>Rincian Pesanan</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Total Pembayaran: Rp{{ number_format($total, 0, ',', '.') }}</h4>

        <div class="mt-3">
            <a href="{{ route('cart.view') }}" class="btn btn-primary">Kembali ke Keranjang</a>
            <a href="{{ route('consumer.struk.download') }}" class="btn btn-success">Unduh Struk (PDF)</a>
        </div>
    </div>
</body>
</html>
