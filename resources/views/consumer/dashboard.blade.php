<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Konsumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">Warung Brader</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Tombol untuk kembali ke halaman Home -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <!-- Tombol untuk menuju halaman Keranjang -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.view') }}">Keranjang</a>
                    </li>
                    <!-- Tombol untuk menu (tidak ada link spesifik) -->
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Pesan Sukses -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Judul Halaman -->
        <h1 class="text-center mb-4" id="menu">Menu Warung Brader</h1>

        <!-- Grid Menu Makanan -->
        <div class="row">
            @foreach ($foods as $food)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <img src="{{ asset('storage/' . $food->foto) }}" class="card-img-top" alt="{{ $food->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $food->name }}</h5>
                        <p class="card-text text-truncate">{{ $food->description }}</p>
                        <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($food->price, 0, ',', '.') }}</p>
                        
                        <!-- Form Tambah ke Keranjang -->
                        <form action="{{ route('cart.add', $food->id) }}" method="POST" class="mt-auto">
                            @csrf
                            <div class="mb-2">
                                <input type="number" name="quantity" class="form-control" placeholder="Jumlah" min="1" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
