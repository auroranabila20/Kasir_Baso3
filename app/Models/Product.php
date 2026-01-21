<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'nama_menu',
        'harga',
        'kategori_id',
        'stok',
        'stok_minimal',
        'is_active',
    ];

    public static function nomorSku()
    {
        $prefix = 'SKU-';
        $maxId = self::max('id') ?? 0;

        return $prefix . str_pad($maxId + 1, 4, '0', STR_PAD_LEFT);
    }

    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}
