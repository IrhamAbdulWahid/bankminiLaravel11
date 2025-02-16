<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h3>Detail Nasabah</h3>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ Auth::user()->ktp }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr>
            <th>Saldo</th>
            <td>{{ Auth::user()->transaksi->sum('tabungan') }}</td>
        </tr>
    </table>
    <br />
    <br />
    <h3>Detail Transaksi</h3>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Nominal</th>
        </tr>
        @foreach ($semuaTransaksi as $st)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $st->created_at }}</td>
            <td>{{ $st->tabungan }}</td>
        </tr>
            
        @endforeach
    </table>
    
</body>
</html>