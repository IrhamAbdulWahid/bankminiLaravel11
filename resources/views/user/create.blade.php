@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah User</div>

                <div class="card-body">
                    @if (Auth::user()->peran == 'admin')
                        <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="ktp">NIK</label>
                                <input type="text" name="ktp" class="form-control" value="{{ old('ktp') }}" 
                                required />
                                @error('ktp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">NAMA</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" 
                                required />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">EMAIL</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" 
                                required />
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">PASSWORD</label>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}" 
                                required />
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hp">HP</label>
                                <input type="text" name="hp" class="form-control" value="{{ old('hp') }}"
                                required />
                                @error('hp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="peran">Peran</label>
                                <select name="peran" class="form-control"
                                required>
                                    <option value="admin">Admin</option>
                                    <option value="teller">Teller</option>
                                    <option value="nasabah">Nasabah</option>
                                </select>
                                @error('peran')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror    
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        </form>
                    @else
                        <h1>Anda tidak mempunyai akses ke halaman ini</h1>
                        <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 