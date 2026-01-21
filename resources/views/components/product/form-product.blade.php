<div>
    {{-- Tombol Edit / Product Baru --}}
    <button type="button" 
            class="btn {{ $id ? 'btn-default' : 'btn-primary'}}" 
            data-toggle="modal" 
            data-target="#formProduct{{ $id ?? '' }}">
        {{ $id ? 'Edit' : 'Menu Baru' }}
        @if ($id)
            <i class="fas fa-edit"></i>
        @else
            
        @endif
    </button>

    {{-- Tombol Delete (hanya muncul jika ada ID) --}}
    @if($id)
        <button type="button"
                class="btn btn-danger ml-1"
                data-toggle="modal"
                data-target="#modalDelete{{ $id }}">
            <i class="fas fa-trash"></i>
        </button>

        {{-- Modal Konfirmasi Delete --}}
        <div class="modal fade" id="modalDelete{{ $id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Hapus Menu?</h5>
                        <button type="button" class="close text-white" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <p>Yakin ingin menghapus <strong>{{ $nama_menu }}</strong>?</p>
                    </div>

                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                            Batal
                        </button>

                        <form action="{{ route('master-data.product.destroy', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endif
</div>


    <div class="modal fade" id="formProduct{{ $id ?? '' }}">
        <form action="{{ route('master-data.product.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id ?? '' }}">

            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="overlay d-none" id="overlayProduct">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>

                    <div class="modal-header">
                        <h4 class="modal-title">
                            {{ $id ? 'Form Edit Product' : 'Form Product Baru' }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group my-1">
                            <label>Nama Menu</label>
                            <input type="text" 
                                   name="nama_menu" 
                                   class="form-control" 
                                   value="{{ $id ? $nama_menu : old('nama_menu') }}">
                        </div>

                        <div class="form-group my-1">
                            <label>Kategori Produk</label>
                            <select name="kategori_id" class="form-control">
                                <option value="">Pilih Kategori</option>

                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}"
                                        {{ ($kategori_id ?? old('kategori_id')) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-1">
                            <label for="">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" value="{{ $id ? $harga : old('harga') }}">
                        </div>
                       <div class="form-group my-1">
                            <label for="">Stok</label>
                            <input type="number" name="stok" id="stok" class="form-control" value="{{ $id ? $stok : old('stok') }}">
                        </div>
                        <div class="form-group my-1">
                            <label for="">Stok Persediaan</label>
                            <input type="number" name="stok_persediaan" id="stok" class="form-control" value="{{ $id ? $stok : old('stok') }}">
                        </div>
                        <div class="form-group my-1">
                            <label for="">Stok Minimal</label>
                            <input type="number" name="stok_minimal" id="stok" class="form-control" value="{{ $id ? $stok_minimal : old('stok_minimal') }}">
                        </div>
 </div>
 <div class="form-group my-1 d-flex flex-column">
    <div class="d-flex align-items-center">
 <label for="" class="mr-4"> Menu Aktif ? </label>
    <input type="checkbox" name="is_active" id="is_active"
    {{ old('is_active', $id ? $is_active :false) ? 'checked' : '' }}
    >
 </div>
  <small class="text-secondary -mt-2">Jika aktif maka menu akan ditampilkan di halaman kasir</small>
   </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" cass="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
