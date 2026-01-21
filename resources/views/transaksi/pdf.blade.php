<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Struk PDF</title>

    <style>
        body {
            font-family: monospace;
            font-size: 10px;
        }

        .center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 2px 0;
            vertical-align: top;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 6px 0;
        }

        .right {
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="center">
        <strong>BAKSO AMMAR</strong><br>
        Jl. Rancamanyar<br>
        ====================
    </div>

    <p>
        Kode : {{ $transaksi->kode_transaksi }}<br>
        Tgl  : {{ $transaksi->tanggal->format('d-m-Y H:i') }}<br>
        Kasir: {{ $transaksi->kasir->name ?? '-' }}
    </p>

    <div class="line"></div>

    <table>
        @foreach ($transaksi->details as $item)
            <tr>
                <td colspan="2">{{ $item->product->nama_menu }}</td>
            </tr>
            <tr>
                <td>{{ $item->qty }} x {{ number_format($item->harga) }}</td>
                <td class="right">{{ number_format($item->subtotal) }}</td>
            </tr>
        @endforeach
    </table>

    <div class="line"></div>

    <table>
        <tr>
            <td><strong>TOTAL</strong></td>
            <td class="right"><strong>{{ number_format($transaksi->total) }}</strong></td>
        </tr>
    </table>

    <div class="line"></div>

    <div class="center">
        TERIMA KASIH 🙏<br>
        ====================
    </div>

</body>
</html>
