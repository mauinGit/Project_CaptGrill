<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        .title {
            text-align: center;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }
        td {
            padding: 2px 0;
        }
        .line {
            border-bottom: 1px dashed #000;
            margin: 8px 0;
        }
        .right { text-align: right; }
        .bold { font-weight: bold; }
    </style>

</head>
<body>

<div class="title">
    <strong>CAPT. GRILL</strong><br>
    <small>Jl. Angkatan 45, Palembang</small>
</div>

<div class="line"></div>

<table>
    <tr><td>Order ID</td><td class="right">{{ $order->id }}</td></tr>
    <tr><td>Tanggal</td><td class="right">{{ $order->created_at->format('d M Y H:i') }}</td></tr>
    <tr><td>Pelanggan</td><td class="right">{{ $order->customer_name }}</td></tr>
    <tr><td>Metode</td><td class="right">{{ strtoupper($order->payment_method) }}</td></tr>
</table>

<div class="line"></div>

<table>
    <tr class="bold">
        <td>Menu</td>
        <td class="right">Qty</td>
        <td class="right">Harga</td>
        <td class="right">Sub</td>
    </tr>

    @foreach ($items as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td class="right">{{ $item->pivot->quantity }}</td>
        <td class="right">{{ number_format($item->pivot->price, 0, ',', '.') }}</td>
        <td class="right">{{ number_format($item->pivot->subtotal, 0, ',', '.') }}</td>
    </tr>
    @endforeach
</table>

<div class="line"></div>

<table>
    <tr>
        <td>Total Qty</td>
        <td class="right">{{ $order->quantity }}</td>
    </tr>
    <tr class="bold">
        <td>Grand Total</td>
        <td class="right">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
    </tr>
</table>

<div class="line"></div>

<p style="text-align:center;">Terima kasih telah berbelanja 😊</p>

</body>
</html>