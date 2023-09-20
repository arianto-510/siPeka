<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Cafe Lia Cafe&Resto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .invoice-container {
            max-width: 300px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
        }

        .invoice-header h1 {
            margin: 0;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-details table th,
        .invoice-details table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .invoice-footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Cafe Lia Cafe&Resto</h1>
            <p>Jl. Menwa, Desa Popalia, Kec. Tanggetada</p>
            <p>Telp: +62 823-4909-5583</p>
        </div>
        <div class="invoice-details">
            <table>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Harga</th>
                </tr>
                @foreach ($dataStruk->transaction as $struk)
                    <tr>
                        <td>{{ $struk->product->nama }}</td>
                        <td>x {{ $struk->quantity }}</td>
                        <td>Rp. {{ $struk->product->harga }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="invoice-footer">
            @php
                $total = 0;
            @endphp
            @foreach ($dataStruk->transaction as $struk)
                @php
                    $total += $struk->total;
                @endphp
            @endforeach
            <strong>
                <p>Total: Rp {{ $total }}</p>
            </strong>
            <p>Metode Pembayaran: Cash</p>
            <p>Terimakasih telah berkunjung </p>
        </div>
    </div>
</body>

</html>
