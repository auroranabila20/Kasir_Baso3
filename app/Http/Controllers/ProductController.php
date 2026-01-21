<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $id = $request->id;

        // Validasi
        $request->validate([
            'nama_menu'     => 'required|unique:products,nama_menu,' . $id,
            'harga'         => 'required|numeric|min:0',
            'kategori_id'   => 'required|exists:kategoris,id',
            'stok'          => 'required|numeric|min:0',
            'stok_minimal'  => 'required|numeric|min:0',
        ]);

        // Data
        $data = [
            'nama_menu'     => $request->nama_menu,
            'harga'         => $request->harga,
            'kategori_id'   => $request->kategori_id,
            'stok'          => $request->stok,
            'stok_minimal'  => $request->stok_minimal,
            'is_active'     => $request->has('is_active') ? 1 : 0,
        ];

        // Jika create → generate SKU
        if (!$id) {
            $data['sku'] = Product::nomorSku();
        }

        // Simpan data (create/update)
        Product::updateOrCreate(
            ['id' => $id],
            $data
        );

        toast()->success('Data berhasil disimpan');

        return redirect()->route('master-data.product.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        toast()->success('Menu berhasil dihapus');

        return back();
    }
}
