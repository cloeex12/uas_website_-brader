<?php
// Model Transaction
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $fillable = ['user_id', 'payment_method', 'total_price'];

    public function transactionItems()
    {
        return $this->hasMany(TransaksiItem::class);
    }
}

// Model TransaksiItem
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    use HasFactory;

    
    protected $fillable = ['transaction_id', 'food_id', 'quantity', 'price'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
