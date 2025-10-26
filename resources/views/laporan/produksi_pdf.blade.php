<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Produksi</title>
    <style>
        body { font-family: sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 10px;
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
    <h2>Laporan Produksi Telur</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kandang</th>
                <th>Jumlah Ayam</th>
                <th>Jumlah Telur</th>
                {{-- <th>Berat Total</th> --}}
                <th>Telur Bagus</th>
                <th>Telur Rusak</th>
                <th>Pakan digunakan (Kg)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->tanggal_produksi }}</td>
                <td>{{ $item->kandang->kandang }}</td>
                <td>{{ $item->jumlah_ayam }}</td>
                <td>{{ $item->jumlah_telur }}</td>
                {{-- <td>{{ $item->berat_total }}</td> --}}
                <td>{{ $item->telur_bagus }}</td>
                <td>{{ $item->telur_rusak }}</td>
                <td>{{ $item->pakan_digunakan }} Kg</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
