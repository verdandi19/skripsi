<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    public function barang()
    {
        $this->belongsTo(Barang::class, 'barang_id');
    }

    public function transaction()
    {
        $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
