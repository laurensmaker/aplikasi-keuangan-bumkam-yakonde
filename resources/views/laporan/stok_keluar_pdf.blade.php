<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Stok Keluar</title>
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
    <h2>Laporan Stok Keluar</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kandang</th>
                <th>Tanggal Keluar</th>
                <th>Nama Pakan</th>
                <th>Jumlah Keluar (Kg)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <th>{{ $item->kandang->kandang }}</th>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_keluar)->format('d-m-Y') }}</td>
                <td>{{ $item->nama_pakan }}</td>
                <td>{{ $item->jumlah_keluar }} Kg</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
