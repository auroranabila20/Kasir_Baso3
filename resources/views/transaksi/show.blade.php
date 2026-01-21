@extends('layouts.app')

@section('content_title', 'Detail Transaksi')

@section('content')
<div class="card">
  <div class="card-body">

    <p><strong>Kode:</strong> {{ $transaksi->kode_transaksi }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->tanggal->format('d-m-Y H:i') }}</p>
    <p><strong>Kasir:</strong> {{ $transaksi->kasir->name ?? '-' }}</p>

    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>Produk</th>
          <th>Qty</th>
          <th>Harga</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transaksi->details as $item)
        <tr>
          <td>{{ $item->product->nama_menu }}</td>
          <td>{{ $item->qty }}</td>
          <td>Rp {{ number_format($item->harga) }}</td>
          <td>Rp {{ number_format($item->subtotal) }}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th colspan="3" class="text-right">Total</th>
          <th>Rp {{ number_format($transaksi->total) }}</th>
        </tr>
      </tfoot>
    </table>

    <a href="{{ route('transaksi.print', $transaksi->id) }}"
       target="_blank"
       class="btn btn-secondary">
      Print Struk
    </a>

    <a href="{{ route('transaksi.pdf', $transaksi->id) }}"
   target="_blank"
   class="btn btn-danger">
   Download PDF
</a>


  </div>
</div>
@endsection
