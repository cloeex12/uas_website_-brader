<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kategori';

    // Kolom yang dapat diisi
    protected $fillable = ['id', 'name'];
}
