@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Beranda Admin - User / Nasabah</div>

                <div class="card-body">
                    @if (Auth::user()->peran == 'admin')
                    <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User / Nasabah</a>
                    <br />
                    <br />
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Hp</th>
                                <th>Peran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->ktp }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->hp }}</td>
                                <td>
                                    <span class="badge 
                                        @if($u->peran == 'admin') badge-primary
                                        @elseif($u->peran == 'nasabah') badge-success
                                        @else badge-secondary
                                        @endif">
                                        {{ ucfirst($u->peran) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('users.hapus', $u->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                    @if ($u->peran == 'nasabah')
                                    <a href="{{ route('admin.laporan.cetak.pilih', $u->id) }}" class="btn btn-success btn-sm" target="_blank">
                                        <i class="fas fa-print"></i> Cetak
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach  
                        </tbody>
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
