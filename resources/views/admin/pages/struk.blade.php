@dd($dataStruk)
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
            <p>Jl. Contoh No. 123, Kota Contoh</p>
            <p>Telp: (123) 456-7890</p>
        </div>
        <div class="invoice-details">
            <table>
                @foreach ($dataStruk as $struk)
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td>{{ $struk->product_id->nama }}</td>
                        <td>2</td>
                        <td>Rp 20,000</td>
                    </tr>
                    <tr>
                        <td>Cappuccino</td>
                        <td>1</td>
                        <td>Rp 18,000</td>
                    </tr>
                    <tr>
                        <td>Chocolate Cake</td>
                        <td>1</td>
                        <td>Rp 25,000</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="invoice-footer">
            <p>Total: Rp 63,000</p>
            <p>Payment Method: Cash</p>
            <p>Thank you for dining with us!</p>
        </div>
    </div>
</body>

</html>
