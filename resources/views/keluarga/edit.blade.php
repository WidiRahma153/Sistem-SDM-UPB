@extends('adminlte::page')

@section('title', 'Edit Keluarga')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Keluarga</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('keluarga.update', $keluarga->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id_dosen" value="{{ $keluarga->id_dosen }}">

            <div class="form-group">
                <label for="nama">Nama Anggota Keluarga</label>
                <input type="text" name="nama" class="form-control" 
                       value="{{ old('nama', $keluarga->nama) }}" required>
            </div>

            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" name="nik" class="form-control" 
                       value="{{ old('nik', $keluarga->nik) }}" required>
            </div>

            <div class="form-group">
                <label for="tmpt_lahir">Tempat Lahir</label>
                <input type="text" name="tmpt_lahir" class="form-control" 
                       value="{{ old('tmpt_lahir', $keluarga->tmpt_lahir) }}" required>
            </div>

            <div class="form-group">
                <label for="nik">Tanggal Lahir</label>
                <input type="text" name="tgl_lahir" class="form-control" 
                       value="{{ old('tgl_lahir', $keluarga->tgl_lahir) }}" required>
            </div>

            <div class="form-group">
                <label for="nik">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" 
                       value="{{ old('tgl_lahir', $keluarga->tgl_lahir) }}" required>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jk" class="form-control" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('jk', $keluarga->jk) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="P" {{ old('jk', $keluarga->jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="hubungan_keluarga">Hubungan Keluarga</label>
                <input type="text" name="hubungan_keluarga" class="form-control" 
                       value="{{ old('hubungan_keluarga', $keluarga->hubungan_keluarga) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('keluarga.show', $keluarga->id_dosen) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
