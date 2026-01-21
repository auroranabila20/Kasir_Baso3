@extends('layouts.app')
@section('content_title', 'Edit Transaksi')

@section('content')
<form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
  @csrf
  @method('PUT')

  @foreach($transaksi->details as $i => $detail)
    <div class="mb-2">
      <strong>{{ $detail->product->nama_menu }}</strong>
      <input type="number"
             name="items[{{ $i }}][qty]"
             value="{{ $detail->qty }}"
             min="1"
             class="form-control">
      <input type="hidden"
             name="items[{{ $i }}][product_id]"
             value="{{ $detail->product_id }}">
    </div>
  @endforeach

  <button class="btn btn-success">
    Simpan Perubahan
  </button>
</form>
@endsection
