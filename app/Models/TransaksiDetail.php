<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $fillable = [
        'transaksi_id',
        'product_id',
        'qty',
        'harga',
        'subtotal',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
