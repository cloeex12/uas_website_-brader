<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = [
        'Transaksi_id',
        'food_id',
        'quantity',
        'price',
        'subtotal',
    ];

    // Relasi ke model Transaksi
    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    // Relasi ke model Food
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
