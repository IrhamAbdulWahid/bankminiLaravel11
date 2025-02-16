<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Laporan Seluruh Transaksi</h1>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Nasabah</th>
            <th>Nominal</th>
        </tr>
        @foreach ($semuaTransaksi as $st)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ isset($st->created_at) ? $st->created_at->format('d-m-Y H:i:s') : '-' }}</td> <!-- Cegah error jika null -->
            <td>{{ $st->user->name ?? '-' }}</td> <!-- Cegah error jika user null -->
            <td>{{ number_format($st->tabungan, 0, ',', '.') }}</td> <!-- Format angka -->
        </tr>    
        @endforeach
    </table>
</body>
</html>