@extends('layouts.master')
@section('title', 'Tambah Pesanan')
@section('content')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold mb-4">Tambah Pesanan Baru</h1>

    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf
        <div class="space-y-4">
            <div class="form-group">
                <label for="nama_pembeli" class="block">Nama Pembeli</label>
                <input type="text" name="nama_pembeli" id="nama_pembeli" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="form-group">
                <label for="barang_id" class="block">Pilih Barang</label>
                <select name="barang_id" id="barang_id" class="w-full p-2 border border-gray-300 rounded-md" required>
                    <option value="">Pilih Barang</option>
                    @foreach ($barang as $item)
                        <option value="{{ $item['id'] }}" 
                                data-harga="{{ $item['harga'] }}" 
                                data-stok="{{ $item['stok'] }}" 
                                data-ukuran="{{ json_encode($item['ukuran_tersedia']) }}">
                            {{ $item['merk'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ukuran_id" class="block">Pilih Ukuran</label>
                <select name="ukuran_id" id="ukuran_id" class="w-full p-2 border border-gray-300 rounded-md" required>
                    <option value="">Pilih Ukuran</option>
                </select>
            </div>

            <div class="form-group">
                <label for="harga" class="block">Harga</label>
                <input type="number" name="harga" id="harga" class="w-full p-2 border border-gray-300 rounded-md" readonly required>
            </div>

            <div class="form-group">
                <label for="stok" class="block">Stok Barang</label>
                <input type="number" name="stok" id="stok" class="w-full p-2 border border-gray-300 rounded-md" readonly required>
            </div>

            <div class="form-group">
                <label for="jumlah" class="block">Jumlah Pesanan</label>
                <input type="number" name="jumlah" id="jumlah" class="w-full p-2 border border-gray-300 rounded-md" required>
                <small class="text-red-500" id="stok-error" style="display:none;">Stok tidak mencukupi!</small>
            </div>

            <button type="submit" id="submit-button" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600" disabled>Pesan</button>
            <a href="{{ route('pesanan.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600">Kembali</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('barang_id').addEventListener('change', function () {
    var selectedOption = this.options[this.selectedIndex];
    var harga = selectedOption.getAttribute('data-harga');
    var stok = selectedOption.getAttribute('data-stok');
    var ukuranTersedia = JSON.parse(selectedOption.getAttribute('data-ukuran'));

    // Update harga dan stok
    document.getElementById('harga').value = harga;
    document.getElementById('stok').value = stok;

    // Update ukuran
    var ukuranSelect = document.getElementById('ukuran_id');
    ukuranSelect.innerHTML = '<option value="">Pilih Ukuran</option>';
    ukuranTersedia.forEach(function (ukuran) {
        var option = document.createElement('option');
        option.value = ukuran;
        option.textContent = ukuran;
        ukuranSelect.appendChild(option);
    });

    // Reset validasi
    document.getElementById('submit-button').disabled = false;
    document.getElementById('stok-error').style.display = 'none';
});

</script>

@endsection
