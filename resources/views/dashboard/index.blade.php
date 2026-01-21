@extends('layouts.app')
@section('content_title', 'Dashboard')

@section('content')
<div class="container-fluid">

    {{-- Welcome --}}
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">Selamat Datang 👋</h4>
                <small class="text-muted">
                    Kasir POS Bakso — <strong>{{ auth()->user()->name }}</strong>
                </small>
            </div>
            <i class="fas fa-bowl-hot fa-3x text-danger opacity-25"></i>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="row">

        {{-- Penjualan Hari Ini --}}
        <div class="col-md-4 mb-3">
            <div class="stat-card bg-red">
                <h6>Penjualan Hari Ini</h6>
                <h3>
                    Rp {{ number_format($penjualanHariIni ?? 0) }}
                </h3>
                <i class="fas fa-cash-register"></i>
            </div>
        </div>

        {{-- Total Transaksi --}}
        <div class="col-md-4 mb-3">
            <div class="stat-card bg-soft-red">
                <h6>Total Transaksi</h6>
                <h3>
                    {{ $totalTransaksi ?? 0 }} Transaksi
                </h3>
                <i class="fas fa-receipt"></i>
            </div>
        </div>

        {{-- Produk Terlaris --}}
        <div class="col-md-4 mb-3">
            <div class="stat-card bg-dark-red">
                <h6>Produk Terlaris</h6>
                <h3>
                    {{ $produkTerlaris->product->nama_menu ?? 'Belum ada transaksi' }}
                </h3>
                <small>
                    Terjual {{ $produkTerlaris->total_qty ?? 0 }} porsi
                </small>
                <i class="fas fa-fire"></i>
            </div>
        </div>

    </div>

    {{-- Transaksi Terbaru --}}
    <div class="card mt-4">
        <div class="card-header border-0">
            <h5 class="mb-0">Transaksi Terbaru</h5>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Detail Menu</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksiTerbaru as $trx)
                        <tr>
                            <td>{{ $trx->kode_transaksi }}</td>
                            <td>{{ $trx->created_at->format('d-m-Y H:i') }}</td>
                            <td>Rp {{ number_format($trx->total) }}</td>
                            <td>
                                <ul style="padding-left: 1rem; margin:0;">
                                    @foreach ($trx->details as $detail)
                                        <li>
                                            {{ $detail->product->nama_menu ?? '-' }} × {{ $detail->qty }} = Rp {{ number_format($detail->qty * $detail->harga) }}
                                        </li>
                                    @endforeach
                                </ul>
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

</div>
@endsection
