@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">BankSuperMini</div>

                <div class="card-body">
                     @if (Auth::user()->peran == 'admin')
                     <h1>Selamat Datang Admin</h1>
                     <a href="{{ route('users.index') }}" class="btn btn-primary">User / Nasabah</a>
                     <a href="{{ route('admin.laporan.cetak') }}" target="_blank" class="btn btn-primary">Laporan</a>

                     @elseif (Auth::user()->peran == 'teller')
                     <h1>Selamat Datang Teller</h1>
                     <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Transaksi</a>

                     @elseif (Auth::user()->peran == 'nasabah')
                     <h1>Selamat Datang Nasabah</h1>
                     <a href="{{ route('nasabah.index') }}" class="btn btn-primary">Laporan</a>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
