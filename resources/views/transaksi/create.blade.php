@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Transaksi</div>

                <div class="card-body">
                    @if (Auth::user()->peran == 'teller')
                    <a href="{{ route('transaksi.index') }}" class="btn btn-warning">Kembali</a>

                    <br />
                    <br />
                    <form action="{{ route('transaksi.cari') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="ktp">Nasabah</label>
                            <input type="text" name="ktp" id="ktp" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                    <br />
                    <br />
                    @isset($nasabah)
                    Nama: {{ $nasabah->name }} <br />
                    NIK: {{ $nasabah->ktp }} <br />
                    <form action="{{ route('transaksi.store') }}" method="POST" id="form-nabung" name="form-nabung">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $nasabah->id }}" />
                        <div class="form-group
                        <label for="tabungan">Nominal
                            <input type="number" name="tabungan" id="tabungan" class="form-control" />
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                        </label>
                    </form>
                    @else
                    <div class="alert alert-danger">
                        Nasabah tidak ditemukan, Pastikan NIK benar dan coba lagi
                    </div>
                    @endisset
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
