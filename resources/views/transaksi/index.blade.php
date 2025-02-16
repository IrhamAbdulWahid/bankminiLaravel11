@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Transaksi</div>

                <div class="card-body">
                    @if (Auth::user()->peran == 'teller')
                    <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
                    <br />
                    <br />
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nasabah</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($semuaTransaksi as $st)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ isset($st->created_at) ? $st->created_at->format('d-m-Y H:i:s') : '-' }}</td> <!-- Cegah error jika null -->
                            <td>{{ $st->user->name ?? '-' }}</td> <!-- Cegah error jika user null -->
                            <td>{{ number_format($st->tabungan, 0, ',', '.') }}</td> <!-- Format angka -->
                            <td>
                                <a href="{{ route('transaksi.edit', $st->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('transaksi.hapus', $st->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>    
                        @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
