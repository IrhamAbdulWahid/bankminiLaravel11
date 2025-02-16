@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Beranda Nasabah</div>

                <div class="card-body">
                    @if (Auth::user()->peran == 'nasabah')
                    <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                    <a href="{{ route('nasabah.cetak') }}" target="_blank" class="btn btn-primary">Cetak Laporan Nasabah</a>
                    <br />
                    <br />
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
                    @else
                        <h1>Anda tidak mempunyai akses ke halaman ini</h1>

                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
