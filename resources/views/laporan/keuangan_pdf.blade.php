<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { font-weight: bold; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Keuangan Usaha Peternakan Ayam Petelur</h2>

    <table>
        <tr>
            <th>Keterangan</th>
            <th>Total (Rp)</th>
        </tr>
        <tr>
            <td>Pemasukan (Penjualan Telur)</td>
            <td>Rp {{ number_format($data['pemasukan'], 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Pengeluaran (Pembelian Pakan)</td>
            <td>Rp {{ number_format($data['pengeluaran'], 0, ',', '.') }}</td>
        </tr>
        <tr class="total">
            <td>Keuntungan Bersih</td>
            <td>Rp {{ number_format($data['keuntungan'], 0, ',', '.') }}</td>
        </tr>
    </table>

    <br><br>
    <p><strong>Tanggal Cetak:</strong> {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
</body>
</html>
