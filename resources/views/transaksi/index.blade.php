@extends('layouts.app')

@section('content_title', 'Data Transaksi')

@section('content')
<div class="card">
  <div class="card-body">

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <table class="table table-bordered table-hover" id="table2">
      <thead class="text-center">
        <tr>
          <th>Kode</th>
          <th>Tanggal</th>
          <th>Total</th>
          <th style="width: 180px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($transaksis as $trx)
        <tr>
          <td>{{ $trx->kode_transaksi }}</td>

          {{-- created_at sudah Carbon --}}
          <td>{{ $trx->created_at->format('d-m-Y H:i') }}</td>

          <td>Rp {{ number_format($trx->total) }}</td>

          <td class="text-center">

            {{-- DETAIL --}}
            <a href="{{ route('transaksi.show', $trx->id) }}"
               class="btn btn-info btn-sm">
              <i class="fas fa-eye"></i>
            </a>

            {{-- PRINT --}}
            <a href="{{ route('transaksi.print', $trx->id) }}"
               target="_blank"
               class="btn btn-secondary btn-sm">
              <i class="fas fa-print"></i>
            </a>

            {{-- HAPUS TRANSAKSI --}}
            <form action="{{ route('transaksi.destroy', $trx->id) }}"
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('Yakin ingin menghapus transaksi ini?\nStok akan dikembalikan!')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>
              </button>
            </form>

          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="text-center text-muted">
            Belum ada transaksi
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
