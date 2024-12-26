@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')

<div class="container mx-auto px-4">
    <div class="max-w-md mx-auto bg-white p-6 shadow-md rounded-lg">
        <h4 class="text-xl font-bold mb-4">Edit Data Kategori</h4>
        <form action="{{ route('kategori.update', $data->id) }}" method="POST">
            @csrf
            @method('PATCH') <!-- Menggunakan PATCH -->
            <div>
                <label for="id">Kode Kategori</label>
                <input type="text" name="id" value="{{ $data->id }}" id="id" disabled>
            </div>
            <div>
                <label for="name">Nama Kategori</label>
                <input type="text" name="name" value="{{ $data->name }}" id="name" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</div>

@endsection
