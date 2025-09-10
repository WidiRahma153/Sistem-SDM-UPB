@extends('adminlte::page')

@section('title', 'Edit Pendidikan')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Pendidikan</h3>
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

        <form action="{{ route('pendidikan.update', $pendidikan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id_dosen" value="{{ $pendidikan->id_dosen }}">

            <div class="form-group">
                <label for="id_jenjang">Jenjang</label>
                <input type="number" name="id_jenjang" class="form-control" 
                       value="{{ old('id_jenjang', $pendidikan->id_jenjang) }}" required>
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" 
                       value="{{ old('jurusan', $pendidikan->jurusan) }}" required>
            </div>

            <div class="form-group">
                <label for="nama_sekolah">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" class="form-control" 
                       value="{{ old('nama_sekolah', $pendidikan->nama_sekolah) }}" required>
            </div>

            <div class="form-group">
                <label for="tgl_lulus">Tanggal Lulus</label>
                <input type="date" name="tgl_lulus" class="form-control" 
                       value="{{ old('tgl_lulus', $pendidikan->tgl_lulus) }}" required>
            </div>

            <div class="form-group">
                <label for="gelar">Gelar</label>
                <input type="text" name="gelar" class="form-control" 
                       value="{{ old('gelar', $pendidikan->gelar) }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pendidikan.show', $pendidikan->id_dosen) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
