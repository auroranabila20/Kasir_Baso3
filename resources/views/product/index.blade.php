@extends('layouts.app')
@section('content_title', 'Data Produk')
@section('content')

<div class="card">
    <div class="card-title">
        <h4 class="card-header">Data Produk</h4>
    </div>

    <div class="card-body">

        {{-- Tombol Tambah --}}
        <div class="d-flex justify-content-end mb-3">
            <x-product.form-product />
        </div>

        {{-- Alert Error --}}
        <x-alert :errors="$errors" type="warning" />

        <table class="table table-bordered table-striped" id="table2">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>SKU</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aktif</th>
                    <th>Opsi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $index => $product)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->nama_menu }}</td>
                    <td>Rp {{ number_format($product->harga) }}</td>
                    <td>{{ number_format($product->stok) }}</td>

                    {{-- Badge Aktif --}}
                    <td class="text-center">
                        <span class="badge {{ $product->is_active ? 'badge-success' : 'badge-danger' }}">
                            {{ $product->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>

                    {{-- Aksi --}}
                    <td class="text-center">
                        <x-product.form-product :id="$product->id" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
