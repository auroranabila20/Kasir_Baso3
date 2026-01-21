<?php

namespace App\Http\Controllers;

use App\Models\Product; // ✅ WAJIB
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)
            ->where('stok', '>', 0)
            ->get();

        return view('kasir.index', compact('products'));
    }
}
