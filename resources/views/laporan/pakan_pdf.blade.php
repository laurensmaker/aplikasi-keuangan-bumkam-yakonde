<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Pakan</title>
    <style>
        body { font-family: sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Laporan Data Pakan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pakan</th>
                <th>Stok Masuk</th>
                <th>Harga per Kg</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->nama_pakan }}</td>
                <td>{{ $item->stok_masuk }}</td>
                <td>Rp {{ number_format($item->harga_per_kg, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
