@extends('layouts.app')
@section('content_title', 'Data Kategori')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Data Kategori</h4>
    </div>

    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger d-flex flex-column">
            @foreach ($errors->all() as $error)
                <small class="text-white my-1">{{ $error }}</small>
            @endforeach
        </div>
        @endif

        <div class="d-flex justify-content-end mb-2">
            <x-kategori.form-kategori />
        </div>

        {{-- PENTING: table-responsive dibungkus div --}}
        <div class="table-responsive">
            <table class="table table-sm table-bordered align-middle" id="table2">
                <thead class="text-center">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 25%">Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th style="width: 15%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategori as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <x-kategori.form-kategori :id="$item->id"/>
                                <a href="{{ route('master-data.kategori.destroy', $item->id) }}"
                                   data-confirm-delete="true"
                                   class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
