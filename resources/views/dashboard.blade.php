<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <!-- Tambahkan Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-500 h-screen text-white">
            <div class="p-4 text-center border-b border-blue-400">
                <h1 class="text-xl font-bold">Menu</h1>
            </div>
            <nav class="mt-4">
                <ul>
                    <li>
                        <a href="{{ url('tampil-barang') }}" class="block py-2 px-4 hover:bg-blue-400">Produk</a>
                    </li>
                    <li>
                        <a href="{{ route('kategori.index') }}" class="block py-2 px-4 hover:bg-blue-400">Kategori</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.index') }}" class="block py-2 px-4 hover:bg-blue-400">laporan</a>
                    </li>
                    <li>
                        <a href="{{ url('home') }}" class="block py-2 px-4 hover:bg-blue-400">Home</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Header -->
            <header class="bg-white shadow-md rounded-lg p-4 mb-6">
                <h1 class="text-2xl font-bold">@yield('header', 'Dashboard')</h1>
            </header>

            <!-- Content -->
            <div>
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
