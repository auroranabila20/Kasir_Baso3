@extends('layouts.app')
@section('content_title', 'Kasir')

@section('content')
<div class="row">

  {{-- DAFTAR PRODUK --}}
  <div class="col-md-7">
    <div class="card">
      <div class="card-header">
        <h4>Daftar Menu</h4>
      </div>
      <div class="card-body">

        @foreach ($products as $product)
        <div class="d-flex justify-content-between align-items-center border p-2 mb-2">
          <div>
            <strong>{{ $product->nama_menu }}</strong><br>
            Rp {{ number_format($product->harga) }} |
            Stok: {{ $product->stok }}
          </div>

          <button class="btn btn-primary btn-sm"
                  onclick="tambahItem(
                    {{ $product->id }},
                    '{{ $product->nama_menu }}',
                    {{ $product->harga }},
                    {{ $product->stok }}
                  )">
            Tambah
          </button>
        </div>
        @endforeach

      </div>
    </div>
  </div>

  {{-- KERANJANG --}}
  <div class="col-md-5">
    <div class="card">
      <div class="card-header">
        <h4>Keranjang</h4>
      </div>
      <div class="card-body">

        <form action="{{ route('transaksi.store') }}" method="POST" id="formTransaksi">
          @csrf

          <table class="table table-sm">
            <thead>
              <tr>
                <th>Menu</th>
                <th>Harga</th>
                <th width="120">Qty</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="cartBody">
              <tr>
                <td colspan="5" class="text-center text-muted">
                  Keranjang kosong
                </td>
              </tr>
            </tbody>
          </table>

          <hr>
          <h4>Total: Rp <span id="total">0</span></h4>

          {{-- INPUT KE BACKEND --}}
          <div id="itemsInput"></div>
          <input type="hidden" name="total" id="inputTotal">

          <button type="submit" class="btn btn-success btn-block mt-2">
            Bayar
          </button>
        </form>

      </div>
    </div>
  </div>

</div>
@endsection

@push('scripts')
<script>
let cart = {};
let total = 0;

function tambahItem(id, nama, harga, stok) {
    if (!cart[id]) {
        cart[id] = {
            nama: nama,
            harga: harga,
            qty: 0,
            stok: stok
        };
    }

    if (cart[id].qty >= cart[id].stok) {
        alert('Stok tidak mencukupi');
        return;
    }

    cart[id].qty++;
    renderCart();
}

function kurangItem(id) {
    if (cart[id].qty > 1) {
        cart[id].qty--;
    } else {
        delete cart[id];
    }
    renderCart();
}

function hapusItem(id) {
    delete cart[id];
    renderCart();
}

function renderCart() {
    let tbody = document.getElementById('cartBody');
    let itemsInput = document.getElementById('itemsInput');
    tbody.innerHTML = '';
    itemsInput.innerHTML = '';
    total = 0;

    let index = 0;
    for (const id in cart) {
        let item = cart[id];
        let subtotal = item.qty * item.harga;
        total += subtotal;

        tbody.innerHTML += `
          <tr>
            <td>${item.nama}</td>
            <td>Rp ${item.harga.toLocaleString()}</td>
            <td>
              <button type="button" class="btn btn-sm btn-danger"
                onclick="kurangItem(${id})">-</button>
              <span class="mx-1">${item.qty}</span>
              <button type="button" class="btn btn-sm btn-success"
                onclick="tambahItem(${id}, '${item.nama}', ${item.harga}, ${item.stok})">+</button>
            </td>
            <td>Rp ${subtotal.toLocaleString()}</td>
            <td>
              <button type="button" class="btn btn-sm btn-outline-danger"
                onclick="hapusItem(${id})">✕</button>
            </td>
          </tr>
        `;

        itemsInput.innerHTML += `
          <input type="hidden" name="items[${index}][product_id]" value="${id}">
          <input type="hidden" name="items[${index}][qty]" value="${item.qty}">
        `;
        index++;
    }

    if (index === 0) {
        tbody.innerHTML = `
          <tr>
            <td colspan="5" class="text-center text-muted">
              Keranjang kosong
            </td>
          </tr>
        `;
    }

    document.getElementById('total').innerText = total.toLocaleString();
    document.getElementById('inputTotal').value = total;
}
</script>
@endpush
