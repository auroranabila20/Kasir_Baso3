<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;

class DashboardController extends Controller
{
    public function index()
    {
        // ✅ Penjualan hari ini (pakai created_at)
        $penjualanHariIni = Transaksi::whereDate('created_at', today())
            ->sum('total');

        // ✅ Total transaksi (semua)
        $totalTransaksi = Transaksi::count();

        // ✅ Produk terlaris (berdasarkan qty)
        $produkTerlaris = TransaksiDetail::select(
                'product_id',
                DB::raw('SUM(qty) as total_qty')
            )
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->with('product')
            ->first();

        // ✅ Transaksi terbaru (dengan relasi details dan produk)
        $transaksiTerbaru = Transaksi::with('details.product')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'penjualanHariIni',
            'totalTransaksi',
            'produkTerlaris',
            'transaksiTerbaru'
        ));
    }
}
