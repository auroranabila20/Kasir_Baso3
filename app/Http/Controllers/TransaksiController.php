<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SIMPAN TRANSAKSI (KASIR)
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'total' => 'required|numeric|min:0'
        ]);

        $transaksi = null;

        DB::transaction(function () use ($request, &$transaksi) {

            $transaksi = Transaksi::create([
                'user_id'        => auth()->id(),
                'kode_transaksi' => 'TRX-' . time(),
                'tanggal'        => now(),
                'total'          => $request->total,
            ]);

            foreach ($request->items as $item) {

                $product = Product::lockForUpdate()->findOrFail($item['product_id']);

                if ($product->stok < $item['qty']) {
                    throw new \Exception("Stok {$product->nama_menu} tidak mencukupi");
                }

                $subtotal = $product->harga * $item['qty'];

                TransaksiDetail::create([
                    'transaksi_id' => $transaksi->id,
                    'product_id'   => $product->id,
                    'qty'          => $item['qty'],
                    'harga'        => $product->harga,
                    'subtotal'     => $subtotal,
                ]);

                $product->decrement('stok', $item['qty']);
            }
        });

        // 🔥 Jika klik Bayar & Cetak
        if ($request->has('print')) {
            return redirect()->route('transaksi.print', $transaksi->id);
        }

        return redirect()->route('dashboard')
            ->with('success', 'Transaksi berhasil disimpan');
    }

    /*
    |--------------------------------------------------------------------------
    | LIST SEMUA TRANSAKSI
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $transaksis = Transaksi::with('kasir')
            ->latest()
            ->get();

        return view('transaksi.index', compact('transaksis'));
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL / REKAP TRANSAKSI
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $transaksi = Transaksi::with(['details.product', 'kasir'])
            ->findOrFail($id);

        return view('transaksi.show', compact('transaksi'));
    }

    /*
    |--------------------------------------------------------------------------
    | CETAK STRUK
    |--------------------------------------------------------------------------
    */
    public function print($id)
    {
        $transaksi = Transaksi::with(['details.product', 'kasir'])
            ->findOrFail($id);

        return view('transaksi.print', compact('transaksi'));
    }

    /*
|--------------------------------------------------------------------------
| CETAK STRUK PDF
|--------------------------------------------------------------------------
*/
public function pdf($id)
{
    $transaksi = Transaksi::with(['details.product', 'kasir'])
        ->findOrFail($id);

    $pdf = Pdf::loadView('transaksi.pdf', compact('transaksi'))
        ->setPaper([0, 0, 226.77, 600], 'portrait'); 
        // 58mm thermal (tinggi auto)

    return $pdf->stream('struk-'.$transaksi->kode_transaksi.'.pdf');
}


    /*
    |--------------------------------------------------------------------------
    | FORM EDIT TRANSAKSI
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $transaksi = Transaksi::with('details.product')
            ->findOrFail($id);

        return view('transaksi.edit', compact('transaksi'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE TRANSAKSI
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {

            $transaksi = Transaksi::with('details')->findOrFail($id);

            // 🔁 Kembalikan stok lama
            foreach ($transaksi->details as $detail) {
                Product::find($detail->product_id)
                    ->increment('stok', $detail->qty);
            }

            // ❌ Hapus detail lama
            $transaksi->details()->delete();

            $total = 0;

            foreach ($request->items as $item) {

                $product = Product::lockForUpdate()->findOrFail($item['product_id']);

                if ($product->stok < $item['qty']) {
                    throw new \Exception("Stok {$product->nama_menu} tidak cukup");
                }

                $subtotal = $product->harga * $item['qty'];
                $total += $subtotal;

                $transaksi->details()->create([
                    'product_id' => $product->id,
                    'qty'        => $item['qty'],
                    'harga'      => $product->harga,
                    'subtotal'   => $subtotal,
                ]);

                $product->decrement('stok', $item['qty']);
            }

            $transaksi->update([
                'total' => $total
            ]);
        });

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui');
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS TRANSAKSI
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {

            $transaksi = Transaksi::with('details')->findOrFail($id);

            // 🔁 Kembalikan stok
            foreach ($transaksi->details as $detail) {
                Product::find($detail->product_id)
                    ->increment('stok', $detail->qty);
            }

            $transaksi->details()->delete();
            $transaksi->delete();
        });

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }
}
