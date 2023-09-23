<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - Lia Cafe and Resto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
        }

        thead {
            background-color: #f2f2f2;
        }

        h2 {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <h2>Laporan Penjualan - Lia Cafe and Resto</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Item</th>
                <th>Jumlah Terjual</th>
                <th>Total Penjualan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPenjualan as $report)
                <tr>
                    <td>{{ $report->created_at }}</td>
                    <td>
                        @foreach ($report->transaction as $rm)
                            <div>{{ $rm->product->nama }}</br></div>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($report->transaction as $rm)
                            <div class="text-center">
                                x {{ $rm->quantity }}</br>
                            </div>
                        @endforeach
                    </td>
                    <td>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($report->transaction as $menu)
                            @php
                                $total += $menu->total;
                            @endphp
                            <div class="text-left">
                                = {{ $menu->total }}</br>
                            </div>
                        @endforeach
                        <strong>
                            <div class="text-left">Total = {{ $total }}</div>
                        </strong>
                    </td>
                </tr>
            @endforeach
            <!-- Tambahkan baris seperti di atas untuk setiap penjualan -->
        </tbody>
    </table>
</body>

</html>
