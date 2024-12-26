<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Sepatu Hanugrah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #eafaf1; /* Pastel Green Background */
            color: #4a4a4a; /* Dark Gray */
        }
        header {
            background-image:url('https://i.pinimg.com/736x/84/0c/5d/840c5d161869cef9c0eef3a216b7a118.jpg');
            background-size:cover;
            background-position:center; 
            color:white;
            padding: 5rem 0;
        }
        .navbar {
            background-color: #8bc6a7; /* Pastel Green Navbar */
        }
        .navbar-dark .navbar-brand, .navbar-dark .nav-link {
            color: #ffffff;
        }
        .bg-primary {
            background-color: #a8d5ba !important; /* Soft Pastel Green */
        }
        .btn-primary {
            background-color: #8bc6a7;
            border-color: #8bc6a7;
        }
        .btn-primary:hover {
            background-color: #77b995;
            border-color: #77b995;
        }
        footer {
            background-color: #77b995; /* Darker Pastel Green Footer */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Toko Hanugrah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Selamat Datang di Toko Hanugrah!</h1>
            <p class="lead">Temukan sepatu favoritmu dengan kualitas terbaik.</p>
        </div>
    </header>

    <main class="container my-5">
        <h2 class="text-center mb-4">Produk Terbaru</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://i.pinimg.com/736x/43/b6/85/43b685a7ce03428180f0a41e82dc7d26.jpg" class="card-img-top" alt="Sepatu 1">
                    <div class="card-body">
                        <h5 class="card-title">Sepatu Fashion</h5>
                        <p class="card-text">Pilihan tepat untuk kamu yang stylish .</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://i.pinimg.com/474x/41/13/a3/4113a3ba05a158041a5836b088271e01.jpg" class="card-img-top" alt="Sepatu 2">
                    <div class="card-body">
                        <h5 class="card-title">Sepatu Formal</h5>
                        <p class="card-text">Pilihan tepat untuk acara resmi.</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://i.pinimg.com/736x/a6/7e/ca/a67ecae790945251643e26b8f107960d.jpg" class="card-img-top" alt="Sepatu 3">
                    <div class="card-body">
                        <h5 class="card-title">Sepatu Casual</h5>
                        <p class="card-text">Cocok untuk kegiatan sehari-hari.</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://i.pinimg.com/736x/fc/ca/89/fcca892e407a95e2299466361be8a8ed.jpg" class="card-img-top" alt="Sepatu 4">
                    <div class="card-body">
                        <h5 class="card-title">Sandal Casual</h5>
                        <p class="card-text">pilihan sempurna untuk gaya santai.</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://i.pinimg.com/736x/ed/53/7d/ed537d0a9dcb87d7124908993625ab55.jpg" class="card-img-top" alt="Sepatu 5">
                    <div class="card-body">
                        <h5 class="card-title">Flat Shoes</h5>
                        <p class="card-text">Tampil anggun di setiap langkah .</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://i.pinimg.com/736x/b4/d0/2f/b4d02f4a53e58b184f95c5bda5ec4b42.jpg" class="card-img-top" alt="Sepatu 6">
                    <div class="card-body">
                        <h5 class="card-title">Sepatu Sport</h5>
                        <p class="card-text">Mendukung setiap langkah olahraga dengan bahan yang ringan, sol empuk, dan daya tahan maksimal untuk aktivitas sehari-hari.</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-white text-center py-3">
        <p>&copy; 2024 Toko Hanugrah. Semua Hak Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
