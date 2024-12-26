<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Perbaikan namespace
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = ['name', 'description', 'price', 'kategori_id', 'foto']; // menambahkan 'image'

    // Relasi ke tabel Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

