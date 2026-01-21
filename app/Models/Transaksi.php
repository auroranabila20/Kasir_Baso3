<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

   protected $fillable = [
    'user_id',
    'kode_transaksi',
    'tanggal',
    'total',
];


    /**
     * ✅ CAST kolom tanggal jadi Carbon
     */
    protected $casts = [
        'tanggal' => 'datetime',
    ];

    /**
     * ✅ RELASI: Transaksi → Detail
     */
    public function details()
    {
        return $this->hasMany(TransaksiDetail::class);
    }

    /**
     * ✅ RELASI: Transaksi → Kasir (User)
     */
    public function kasir()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
