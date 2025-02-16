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
                   Nama : {{ $transaksi->user->name }}<br />
                    NIK : {{ $transaksi->user->ktp }}
                    <br />
                    <br />    
                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" id="form-nabung" name="form-nabung">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $transaksi->user_id }}" />
                       <div class="form-group
                        <label for="tabungan">Nominal
                            <input type="number" name="tabungan" id="tabungan" class="form-control" 
                            value="{{ $transaksi->tabungan }}"/>
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                        </label>
                    </form>                  
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
