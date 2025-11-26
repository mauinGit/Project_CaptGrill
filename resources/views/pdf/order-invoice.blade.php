<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receipt</title>

    <style>
        body {
            font-family: "DejaVu Sans Mono", monospace;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            width: 250px; /* 58mm thermal */
            padding: 2px;
            margin: auto;
        }

        .center { text-align: center; }
        .bold { font-weight: bold; }

        .line {
            border-bottom: 1px dashed #000;
            margin: 6px 0;
        }

        .double-line {
            border-bottom: 2px solid #000;
            margin: 6px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 2px 0;
        }

        .item-name { width: 55%; }
        .item-qty  { width: 10%; text-align: right; }
        .item-price{ width: 35%; text-align: right; }
    </style>

</head>
<body>
<div class="wrapper">

    <!-- LOGO -->
    <div class="center bold">
    <img src="{{ public_path('images/logo hitam putih.png') }}" 
         width="80" 
         style="margin-bottom: 5px;" 
         alt="logo">
    </div>

    <div class="center" style="margin-bottom:3px;">
        Jl. Nusantara Gg. Buntu, Timbangan, Indralaya Utara, Ogan Ilir 30862
    </div>

    <div class="center" style="margin-bottom:3px;">
        Jam Operasional: 10.00 - 22.00 WIB
    </div>

    <div class="center" style="margin-bottom:5px;">
        Hotline / WA: 0812-3456-7890
    </div>

    <div class="line"></div>

    <!-- ORDER INFO -->
    <table>
        <tr><td>No. Order</td><td>{{ $order->order_code }}</td></tr>
        <tr><td>Tanggal/Jam</td><td>{{ $order->created_at->format('d M Y H:i') }}</td></tr>
        <tr><td>Pelanggan</td><td>{{ $order->customer_name }}</td></tr>
        <tr><td>Metode</td><td>{{ strtoupper($order->payment_method) }}</td></tr>
    </table>

    <div class="double-line"></div>

    <!-- ITEMS -->
    <table>
        <tr class="bold">
            <td class="item-name">Menu</td>
            <td class="item-qty">Qty</td>
            <td class="item-price">Sub</td>
        </tr>

        @foreach($order->menuItems as $item)
        <tr>
            <td class="item-name">{{ $item->name }}</td>
            <td class="item-qty">{{ $item->pivot->quantity }}</td>
            <td class="item-price">{{ number_format($item->pivot->subtotal, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </table>

    <div class="double-line"></div>

    <!-- TOTAL -->
    <table>
        <tr>
            <td>Total Qty</td>
            <td class="item-price">{{ $order->quantity }}</td>
        </tr>

        <tr class="bold">
            <td>Grand Total</td>
            <td class="item-price">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
        </tr>

        <!-- UANG DIBERIKAN -->
        <tr>
            <td>Bayar</td>
            <td class="item-price">Rp {{ number_format($order->cash_given, 0, ',', '.') }}</td>
        </tr>

        <!-- KEMBALIAN -->
        <tr class="bold">
            <td>Kembali</td>
            <td class="item-price">Rp {{ number_format($order->change_amount, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="double-line"></div>

    <div class="center">
        Terimakasih telah berbelanja<br>
        Silahkan datang kembali!
    </div>

</div>
</body>
</html>